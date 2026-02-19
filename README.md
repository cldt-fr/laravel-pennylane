# Pennylane API v2 wrapper for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/c-delouvencourt/laravel-pennylane.svg?style=flat-square)](https://packagist.org/packages/c-delouvencourt/laravel-pennylane)

A comprehensive Laravel wrapper for the [Pennylane API v2](https://pennylane.com/api/external/v2/). Covers all ~127 endpoints with typed Response DTOs, cursor-based pagination, OAuth 2.0 support, and automatic retry.

Built on Laravel's HTTP client (`Illuminate\Http\Client`).

**Requirements:** PHP 8.1+, Laravel 8+

---

## Installation

```bash
composer require c-delouvencourt/laravel-pennylane
```

Publish the configuration file:

```bash
php artisan vendor:publish --provider="CLDT\PennylaneLaravel\PennylaneLaravelServiceProvider" --tag="config"
```

### Authentication

#### Bearer token (default)

```dotenv
PENNYLANE_API_KEY=your_api_key
```

#### OAuth 2.0

```dotenv
PENNYLANE_AUTH_METHOD=oauth2
PENNYLANE_OAUTH_CLIENT_ID=your_client_id
PENNYLANE_OAUTH_CLIENT_SECRET=your_client_secret
PENNYLANE_OAUTH_REDIRECT_URI=https://your-app.com/callback
PENNYLANE_OAUTH_TOKEN=your_access_token
PENNYLANE_OAUTH_REFRESH_TOKEN=your_refresh_token
```

### Retry

All HTTP requests are automatically retried on failure. You can configure this behavior via environment variables:

```dotenv
PENNYLANE_RETRY_TIMES=3      # Number of attempts (default: 3)
PENNYLANE_RETRY_SLEEP=500     # Delay in ms between attempts (default: 500)
PENNYLANE_RETRY_THROW=true    # Throw exception after all attempts fail (default: true)
```

Or directly in `config/pennylane-laravel.php`:

```php
'retry' => [
    'times' => 3,
    'sleep' => 500,
    'throw' => true,
],
```

---

## Usage

All methods return typed Response DTOs with readonly properties. List endpoints return a `PaginatedResponse` with cursor-based pagination.

### Pagination

```php
use CLDT\PennylaneLaravel\PennylaneLaravel;

$result = app(PennylaneLaravel::class)->customers()->list();

$result->items;       // array of CustomerResponse
$result->has_more;    // bool
$result->next_cursor; // ?string

// Fetch next page
$nextPage = app(PennylaneLaravel::class)->customers()->list(['cursor' => $result->next_cursor]);
```

---

## Available Resources

### Customers

```php
$pennylane = app(PennylaneLaravel::class);

// List all customers (company + individual)
$customers = $pennylane->customers()->list();

// Get a customer
$customer = $pennylane->customers()->get('123');

// Customer categories
$categories = $pennylane->customers()->categories('123');
$pennylane->customers()->updateCategories('123', $data);

// Customer contacts
$contacts = $pennylane->customers()->contacts('123');
```

### Company Customers

```php
$customer = $pennylane->companyCustomers()->create([
    'name' => 'Acme Corp',
    'emails' => ['contact@acme.com'],
    'billing_address' => [
        'address' => '1 rue de la Paix',
        'postal_code' => '75001',
        'city' => 'Paris',
        'country_alpha2' => 'FR',
    ],
]);

$customer = $pennylane->companyCustomers()->get('123');
$customer = $pennylane->companyCustomers()->update('123', $data);
```

### Individual Customers

```php
$customer = $pennylane->individualCustomers()->create([
    'first_name' => 'John',
    'last_name' => 'Doe',
    'emails' => ['john@example.com'],
]);

$customer = $pennylane->individualCustomers()->get('123');
$customer = $pennylane->individualCustomers()->update('123', $data);
```

### Products

```php
$products = $pennylane->products()->list();
$product = $pennylane->products()->get('1');

$product = $pennylane->products()->create([
    'label' => 'Product 1',
    'unit' => 'piece',
    'price_before_tax' => '10.00',
    'price' => '12.00',
    'vat_rate' => 'FR_200',
    'currency' => 'EUR',
]);

$product = $pennylane->products()->update('1', ['description' => 'Updated']);
```

### Customer Invoices

```php
// List & CRUD
$invoices = $pennylane->customerInvoices()->list();
$invoice = $pennylane->customerInvoices()->create($data);
$invoice = $pennylane->customerInvoices()->get(1);
$invoice = $pennylane->customerInvoices()->update(1, $data);
$pennylane->customerInvoices()->delete(1);

// Actions
$invoice = $pennylane->customerInvoices()->finalize(1);
$invoice = $pennylane->customerInvoices()->markAsPaid(1);
$pennylane->customerInvoices()->sendByEmail(1, ['emails' => ['client@example.com']]);
$invoice = $pennylane->customerInvoices()->linkCreditNote(1, $data);
$invoice = $pennylane->customerInvoices()->createFromQuote($data);
$invoice = $pennylane->customerInvoices()->updateImported(1, $data);

// Import with file upload (multipart/form-data)
$invoice = $pennylane->customerInvoices()->import(
    fields: ['create_customer' => true],
    attachments: [
        ['name' => 'file', 'contents' => file_get_contents('/path/to/invoice.pdf'), 'filename' => 'invoice.pdf'],
    ],
);

// Sub-resources
$sections = $pennylane->customerInvoices()->invoiceLineSections(1);
$lines = $pennylane->customerInvoices()->invoiceLines(1);
$payments = $pennylane->customerInvoices()->payments(1);
$matched = $pennylane->customerInvoices()->matchedTransactions(1);
$pennylane->customerInvoices()->matchTransaction(1, $data);
$pennylane->customerInvoices()->unmatchTransaction(1, 5);
$appendices = $pennylane->customerInvoices()->appendices(1);

// Upload appendix (multipart/form-data)
$pennylane->customerInvoices()->uploadAppendix(1,
    attachments: [
        ['name' => 'file', 'contents' => file_get_contents('/path/to/appendix.pdf'), 'filename' => 'appendix.pdf'],
    ],
);

$categories = $pennylane->customerInvoices()->categories(1);
$pennylane->customerInvoices()->updateCategories(1, $data);
$fields = $pennylane->customerInvoices()->customHeaderFields(1);
```

### Supplier Invoices

```php
$invoices = $pennylane->supplierInvoices()->list();
$invoice = $pennylane->supplierInvoices()->get(1);
$invoice = $pennylane->supplierInvoices()->update(1, $data);
$invoice = $pennylane->supplierInvoices()->validateAccounting(1);

// Import with file upload (multipart/form-data)
$invoice = $pennylane->supplierInvoices()->import(
    fields: ['create_supplier' => true],
    attachments: [
        ['name' => 'file', 'contents' => file_get_contents('/path/to/invoice.pdf'), 'filename' => 'invoice.pdf'],
    ],
);

// Sub-resources
$lines = $pennylane->supplierInvoices()->invoiceLines(1);
$payments = $pennylane->supplierInvoices()->payments(1);
$pennylane->supplierInvoices()->updatePaymentStatus(1, $data);
$matched = $pennylane->supplierInvoices()->matchedTransactions(1);
$pennylane->supplierInvoices()->matchTransaction(1, $data);
$pennylane->supplierInvoices()->unmatchTransaction(1, 5);
$pennylane->supplierInvoices()->linkPurchaseRequest(1, $data);
$categories = $pennylane->supplierInvoices()->categories(1);
$pennylane->supplierInvoices()->updateCategories(1, $data);
```

### Quotes

```php
$quotes = $pennylane->quotes()->list();
$quote = $pennylane->quotes()->create($data);
$quote = $pennylane->quotes()->get(1);
$quote = $pennylane->quotes()->update(1, $data);
$quote = $pennylane->quotes()->updateStatus(1, ['status' => 'accepted']);
$pennylane->quotes()->sendByEmail(1, $data);

// Sub-resources
$lines = $pennylane->quotes()->invoiceLines(1);
$sections = $pennylane->quotes()->invoiceLineSections(1);
$appendices = $pennylane->quotes()->appendices(1);
$pennylane->quotes()->uploadAppendix(1, $data);
```

### Suppliers

```php
$suppliers = $pennylane->suppliers()->list();
$supplier = $pennylane->suppliers()->create($data);
$supplier = $pennylane->suppliers()->get(1);
$supplier = $pennylane->suppliers()->update(1, $data);
$categories = $pennylane->suppliers()->categories(1);
$pennylane->suppliers()->updateCategories(1, $data);
```

### Billing Subscriptions

```php
$subscriptions = $pennylane->billingSubscriptions()->list();
$subscription = $pennylane->billingSubscriptions()->create($data);
$subscription = $pennylane->billingSubscriptions()->get(1);
$subscription = $pennylane->billingSubscriptions()->update(1, $data);
$sections = $pennylane->billingSubscriptions()->invoiceLineSections(1);
$lines = $pennylane->billingSubscriptions()->invoiceLines(1);
```

### Bank Accounts & Transactions

```php
// Bank accounts
$accounts = $pennylane->bankAccounts()->list();
$account = $pennylane->bankAccounts()->create($data);
$account = $pennylane->bankAccounts()->get(1);

// Bank establishments
$establishments = $pennylane->bankEstablishments()->list();

// Transactions
$transactions = $pennylane->transactions()->list();
$transaction = $pennylane->transactions()->create($data);
$transaction = $pennylane->transactions()->get(1);
$transaction = $pennylane->transactions()->update(1, $data);
$categories = $pennylane->transactions()->categories(1);
$pennylane->transactions()->updateCategories(1, $data);
$matched = $pennylane->transactions()->matchedInvoices(1);
```

### Ledger (Accounts, Entries, Lines, Attachments)

```php
// Ledger accounts
$accounts = $pennylane->ledgerAccounts()->list();
$account = $pennylane->ledgerAccounts()->create($data);
$account = $pennylane->ledgerAccounts()->get(1);
$account = $pennylane->ledgerAccounts()->update(1, $data);

// Ledger entries
$entries = $pennylane->ledgerEntries()->list();
$entry = $pennylane->ledgerEntries()->create($data);
$entry = $pennylane->ledgerEntries()->get(1);
$entry = $pennylane->ledgerEntries()->update(1, $data);
$lines = $pennylane->ledgerEntries()->ledgerEntryLines(1);

// Ledger entry lines
$lines = $pennylane->ledgerEntryLines()->list();
$line = $pennylane->ledgerEntryLines()->get(1);
$pennylane->ledgerEntryLines()->letter($data);
$pennylane->ledgerEntryLines()->unletter($data);
$lettered = $pennylane->ledgerEntryLines()->letteredLines(1);
$categories = $pennylane->ledgerEntryLines()->categories(1);
$pennylane->ledgerEntryLines()->updateCategories(1, $data);

// Ledger attachments
$attachments = $pennylane->ledgerAttachments()->list();

// Upload (multipart/form-data)
$pennylane->ledgerAttachments()->upload(
    attachments: [
        ['name' => 'file', 'contents' => file_get_contents('/path/to/attachment.pdf'), 'filename' => 'attachment.pdf'],
    ],
);
```

### Categories & Category Groups

```php
$categories = $pennylane->categories()->list();
$category = $pennylane->categories()->create($data);
$category = $pennylane->categories()->get(1);
$category = $pennylane->categories()->update(1, $data);

$groups = $pennylane->categoryGroups()->list();
$group = $pennylane->categoryGroups()->get(1);
$categories = $pennylane->categoryGroups()->categories(1);
```

### Journals

```php
$journals = $pennylane->journals()->list();
$journal = $pennylane->journals()->create($data);
$journal = $pennylane->journals()->get(1);
```

### Commercial Documents

```php
$documents = $pennylane->commercialDocuments()->list();
$document = $pennylane->commercialDocuments()->get(1);
$appendices = $pennylane->commercialDocuments()->appendices(1);
$pennylane->commercialDocuments()->uploadAppendix(1, $data);
$lines = $pennylane->commercialDocuments()->invoiceLines(1);
$sections = $pennylane->commercialDocuments()->invoiceLineSections(1);
```

### SEPA & GoCardless Mandates

```php
// SEPA mandates
$mandates = $pennylane->sepaMandates()->list();
$mandate = $pennylane->sepaMandates()->create($data);
$mandate = $pennylane->sepaMandates()->get(1);
$mandate = $pennylane->sepaMandates()->update(1, $data);
$pennylane->sepaMandates()->delete(1);

// GoCardless mandates
$mandates = $pennylane->gocardlessMandates()->list();
$mandate = $pennylane->gocardlessMandates()->get(1);
$pennylane->gocardlessMandates()->sendMailRequest($data);
$pennylane->gocardlessMandates()->cancel(1);
$associations = $pennylane->gocardlessMandates()->associations(1);

// Pro account mandates
$mandates = $pennylane->proAccountMandates()->list();
```

### Exports

```php
$export = $pennylane->exports()->createAnalyticalGeneralLedger($data);
$status = $pennylane->exports()->getAnalyticalGeneralLedger(1);

$export = $pennylane->exports()->createFec($data);
$status = $pennylane->exports()->getFec(1);
```

### File Attachments

```php
$files = $pennylane->fileAttachments()->list();

// Upload (multipart/form-data)
$file = $pennylane->fileAttachments()->upload(
    attachments: [
        ['name' => 'file', 'contents' => file_get_contents('/path/to/document.pdf'), 'filename' => 'document.pdf'],
    ],
);
```

### Purchase Requests

```php
$requests = $pennylane->purchaseRequests()->list();
$request = $pennylane->purchaseRequests()->get(1);
$request = $pennylane->purchaseRequests()->update(1, $data);
$pennylane->purchaseRequests()->import($data);
```

### Other Resources

```php
// Users
$user = $pennylane->users()->create($data);
$user = $pennylane->users()->find(['email' => 'user@example.com']);
$user = $pennylane->users()->update(1, $data);
$me = $pennylane->users()->me();
// Or directly:
$me = $pennylane->me();

// Companies
$pennylane->companies()->create($data);
$pennylane->companies()->completeRegistration(1, $data);

// Webhooks
$webhook = $pennylane->webhooks()->get();

// Customer invoice templates
$templates = $pennylane->customerInvoiceTemplates()->list();

// E-Invoices
$pennylane->eInvoices()->import($data);

// Fiscal years
$years = $pennylane->fiscalYears()->list();

// Trial balance
$balance = $pennylane->trialBalance()->get(['start_date' => '2024-01-01', 'end_date' => '2024-12-31']);

// Changelogs
$changes = $pennylane->changelogs()->customerInvoices(['since' => '2024-01-01']);
$changes = $pennylane->changelogs()->supplierInvoices($params);
$changes = $pennylane->changelogs()->customers($params);
$changes = $pennylane->changelogs()->suppliers($params);
$changes = $pennylane->changelogs()->products($params);
$changes = $pennylane->changelogs()->ledgerEntryLines($params);
$changes = $pennylane->changelogs()->transactions($params);
$changes = $pennylane->changelogs()->quotes($params);
```

---

## Migrating from v2.0 to v2.1

### HTTP client

The underlying HTTP client has been migrated from **GuzzleHTTP** to **Laravel's HTTP facade** (`Illuminate\Http\Client`). This change is transparent for most usages, but if you were injecting `GuzzleHttp\ClientInterface` directly, you need to update to `Illuminate\Http\Client\PendingRequest`.

### File uploads

The `import()` and `upload()` methods now use `multipart/form-data` and accept two parameters instead of one:

| Method | Before | After |
|---|---|---|
| `customerInvoices()->import()` | `import(array $data)` | `import(array $fields = [], array $attachments = [])` |
| `customerInvoices()->uploadAppendix()` | `uploadAppendix(int $id, array $data)` | `uploadAppendix(int $id, array $fields = [], array $attachments = [])` |
| `supplierInvoices()->import()` | `import(array $data)` | `import(array $fields = [], array $attachments = [])` |
| `fileAttachments()->upload()` | `upload(array $data)` | `upload(array $fields = [], array $attachments = [])` |
| `ledgerAttachments()->upload()` | `upload(array $data)` | `upload(array $fields = [], array $attachments = [])` |

Each attachment is an array with the following keys:

```php
['name' => 'file', 'contents' => $fileContents, 'filename' => 'invoice.pdf']
```

### Retry

Automatic retry is now configured by default (3 attempts, 500ms delay). See the [Retry](#retry) section to customize.

### Dependencies

- Removed: `guzzlehttp/guzzle`
- Added: `illuminate/http`

## Migrating from v1 to v2

| v1 | v2 | Notes |
|---|---|---|
| `invoices()` | `customerInvoices()` | `invoices()` still works as deprecated alias |
| `estimates()` | `quotes()` | `estimates()` still works as deprecated alias |
| `enums()->get('unit')` | Removed | Use PHP enums in `Dto\Enums\*` instead |
| Array returns | DTO returns | All methods return typed Response DTOs |
| Offset pagination | Cursor pagination | Use `PaginatedResponse` with `next_cursor` |
| `PENNYLANE_API_KEY` | `PENNYLANE_API_KEY` | Same env var, new config structure |

---

## Response DTOs

All responses use readonly properties and can be created from arrays:

```php
use CLDT\PennylaneLaravel\Dto\Responses\ProductResponse;

$product = $pennylane->products()->get('1');
$product->id;                // int
$product->label;             // string
$product->price_before_tax;  // ?string
$product->currency;          // ?string
$product->created_at;        // ?string
```

## PHP Enums

All API enum values are available as PHP 8.1 backed enums:

```php
use CLDT\PennylaneLaravel\Dto\Enums\InvoiceStatus;
use CLDT\PennylaneLaravel\Dto\Enums\Currency;
use CLDT\PennylaneLaravel\Dto\Enums\VatRate;
use CLDT\PennylaneLaravel\Dto\Enums\PaymentConditions;

InvoiceStatus::Draft->value;          // 'draft'
Currency::EUR->value;                 // 'EUR'
VatRate::FR200->value;                // 'FR_200'
PaymentConditions::Days30->value;     // '30_days'
```

Available enums: `AccountType`, `BillingSubscriptionMode`, `BillingSubscriptionOccurrenceRuleType`, `BillingSubscriptionPaymentMethod`, `BillingSubscriptionStatus`, `CategoryDirection`, `CommercialDocumentType`, `Currency`, `CustomerBillingLanguage`, `DiscountType`, `ExportStatus`, `InvoiceAccountingStatus`, `InvoicePaymentStatus`, `InvoiceStatus`, `MandateStatus`, `PaymentConditions`, `PaymentStatus`, `ProductUnit`, `PurchaseRequestStatus`, `QuoteStatus`, `SepaSequenceType`, `SupplierDueDateRule`, `SupplierPaymentMethod`, `VatRate`.

---

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email clement@meilleursbiens.com instead of using the issue tracker.

## Credits

- [Clement de Louvencourt](https://github.com/c-delouvencourt)
- [Romain Bertolucci](https://github.com/ashraam)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
