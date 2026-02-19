<?php

namespace CLDT\PennylaneLaravel;

use CLDT\PennylaneLaravel\Api\BankAccounts;
use CLDT\PennylaneLaravel\Api\BankEstablishments;
use CLDT\PennylaneLaravel\Api\BillingSubscriptions;
use CLDT\PennylaneLaravel\Api\Categories;
use CLDT\PennylaneLaravel\Api\CategoryGroups;
use CLDT\PennylaneLaravel\Api\Changelogs;
use CLDT\PennylaneLaravel\Api\CommercialDocuments;
use CLDT\PennylaneLaravel\Api\Companies;
use CLDT\PennylaneLaravel\Api\CompanyCustomers;
use CLDT\PennylaneLaravel\Api\CustomerInvoices;
use CLDT\PennylaneLaravel\Api\CustomerInvoiceTemplates;
use CLDT\PennylaneLaravel\Api\Customers;
use CLDT\PennylaneLaravel\Api\EInvoices;
use CLDT\PennylaneLaravel\Api\Exports;
use CLDT\PennylaneLaravel\Api\FileAttachments;
use CLDT\PennylaneLaravel\Api\FiscalYears;
use CLDT\PennylaneLaravel\Api\GocardlessMandates;
use CLDT\PennylaneLaravel\Api\IndividualCustomers;
use CLDT\PennylaneLaravel\Api\Journals;
use CLDT\PennylaneLaravel\Api\LedgerAccounts;
use CLDT\PennylaneLaravel\Api\LedgerAttachments;
use CLDT\PennylaneLaravel\Api\LedgerEntries;
use CLDT\PennylaneLaravel\Api\LedgerEntryLines;
use CLDT\PennylaneLaravel\Api\ProAccountMandates;
use CLDT\PennylaneLaravel\Api\Products;
use CLDT\PennylaneLaravel\Api\PurchaseRequests;
use CLDT\PennylaneLaravel\Api\Quotes;
use CLDT\PennylaneLaravel\Api\SepaMandates;
use CLDT\PennylaneLaravel\Api\SupplierInvoices;
use CLDT\PennylaneLaravel\Api\Suppliers;
use CLDT\PennylaneLaravel\Api\Transactions;
use CLDT\PennylaneLaravel\Api\TrialBalance;
use CLDT\PennylaneLaravel\Api\Users;
use CLDT\PennylaneLaravel\Api\Webhooks;
use CLDT\PennylaneLaravel\Dto\Responses\UserResponse;
use Illuminate\Http\Client\PendingRequest;

class PennylaneLaravel
{
    protected PendingRequest $client;

    public function __construct(PendingRequest $client)
    {
        $this->client = $client;
    }

    public function bankAccounts(): BankAccounts
    {
        return new BankAccounts($this->client);
    }

    public function bankEstablishments(): BankEstablishments
    {
        return new BankEstablishments($this->client);
    }

    public function billingSubscriptions(): BillingSubscriptions
    {
        return new BillingSubscriptions($this->client);
    }

    public function categories(): Categories
    {
        return new Categories($this->client);
    }

    public function categoryGroups(): CategoryGroups
    {
        return new CategoryGroups($this->client);
    }

    public function changelogs(): Changelogs
    {
        return new Changelogs($this->client);
    }

    public function commercialDocuments(): CommercialDocuments
    {
        return new CommercialDocuments($this->client);
    }

    public function companies(): Companies
    {
        return new Companies($this->client);
    }

    public function customers(): Customers
    {
        return new Customers($this->client);
    }

    public function companyCustomers(): CompanyCustomers
    {
        return new CompanyCustomers($this->client);
    }

    public function individualCustomers(): IndividualCustomers
    {
        return new IndividualCustomers($this->client);
    }

    public function customerInvoices(): CustomerInvoices
    {
        return new CustomerInvoices($this->client);
    }

    public function customerInvoiceTemplates(): CustomerInvoiceTemplates
    {
        return new CustomerInvoiceTemplates($this->client);
    }

    public function eInvoices(): EInvoices
    {
        return new EInvoices($this->client);
    }

    public function exports(): Exports
    {
        return new Exports($this->client);
    }

    public function fileAttachments(): FileAttachments
    {
        return new FileAttachments($this->client);
    }

    public function fiscalYears(): FiscalYears
    {
        return new FiscalYears($this->client);
    }

    public function gocardlessMandates(): GocardlessMandates
    {
        return new GocardlessMandates($this->client);
    }

    public function journals(): Journals
    {
        return new Journals($this->client);
    }

    public function ledgerAccounts(): LedgerAccounts
    {
        return new LedgerAccounts($this->client);
    }

    public function ledgerAttachments(): LedgerAttachments
    {
        return new LedgerAttachments($this->client);
    }

    public function ledgerEntries(): LedgerEntries
    {
        return new LedgerEntries($this->client);
    }

    public function ledgerEntryLines(): LedgerEntryLines
    {
        return new LedgerEntryLines($this->client);
    }

    public function proAccountMandates(): ProAccountMandates
    {
        return new ProAccountMandates($this->client);
    }

    public function products(): Products
    {
        return new Products($this->client);
    }

    public function purchaseRequests(): PurchaseRequests
    {
        return new PurchaseRequests($this->client);
    }

    public function quotes(): Quotes
    {
        return new Quotes($this->client);
    }

    public function sepaMandates(): SepaMandates
    {
        return new SepaMandates($this->client);
    }

    public function supplierInvoices(): SupplierInvoices
    {
        return new SupplierInvoices($this->client);
    }

    public function suppliers(): Suppliers
    {
        return new Suppliers($this->client);
    }

    public function transactions(): Transactions
    {
        return new Transactions($this->client);
    }

    public function trialBalance(): TrialBalance
    {
        return new TrialBalance($this->client);
    }

    public function users(): Users
    {
        return new Users($this->client);
    }

    public function webhooks(): Webhooks
    {
        return new Webhooks($this->client);
    }

    public function me(): UserResponse
    {
        return UserResponse::fromArray($this->client->get('me')->json());
    }

    /**
     * @deprecated Use customerInvoices() instead
     */
    public function invoices(): CustomerInvoices
    {
        return $this->customerInvoices();
    }

    /**
     * @deprecated Use quotes() instead
     */
    public function estimates(): Quotes
    {
        return $this->quotes();
    }
}
