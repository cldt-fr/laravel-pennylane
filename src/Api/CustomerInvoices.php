<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CustomerInvoiceResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineSectionResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineResponse;
use CLDT\PennylaneLaravel\Dto\Responses\PaymentResponse;
use CLDT\PennylaneLaravel\Dto\Responses\MatchedTransactionResponse;
use CLDT\PennylaneLaravel\Dto\Responses\AppendixResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CategoryResponse;

class CustomerInvoices extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('customer_invoices', $params), CustomerInvoiceResponse::class);
    }

    public function create(array $data): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpPost('customer_invoices', $data));
    }

    public function createFromQuote(array $data): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpPost('customer_invoices/create_from_quote', $data));
    }

    public function import(array $data): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpPost('customer_invoices/import', $data));
    }

    public function get(int $id): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpGet("customer_invoices/{$id}"));
    }

    public function update(int $id, array $data): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpPut("customer_invoices/{$id}", $data));
    }

    public function delete(int $id): void
    {
        $this->httpDelete("customer_invoices/{$id}");
    }

    public function finalize(int $id): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpPut("customer_invoices/{$id}/finalize"));
    }

    public function markAsPaid(int $id, array $data = []): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpPut("customer_invoices/{$id}/mark_as_paid", $data));
    }

    public function sendByEmail(int $id, array $data): array
    {
        return $this->httpPost("customer_invoices/{$id}/send_by_email", $data);
    }

    public function linkCreditNote(int $id, array $data): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpPost("customer_invoices/{$id}/link_credit_note", $data));
    }

    public function updateImported(int $id, array $data): CustomerInvoiceResponse
    {
        return CustomerInvoiceResponse::fromArray($this->httpPut("customer_invoices/{$id}/update_imported", $data));
    }

    public function invoiceLineSections(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("customer_invoices/{$invoiceId}/invoice_line_sections", $params), InvoiceLineSectionResponse::class);
    }

    public function invoiceLines(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("customer_invoices/{$invoiceId}/invoice_lines", $params), InvoiceLineResponse::class);
    }

    public function payments(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("customer_invoices/{$invoiceId}/payments", $params), PaymentResponse::class);
    }

    public function matchedTransactions(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("customer_invoices/{$invoiceId}/matched_transactions", $params), MatchedTransactionResponse::class);
    }

    public function matchTransaction(int $invoiceId, array $data): MatchedTransactionResponse
    {
        return MatchedTransactionResponse::fromArray($this->httpPost("customer_invoices/{$invoiceId}/matched_transactions", $data));
    }

    public function unmatchTransaction(int $invoiceId, int $transactionId): void
    {
        $this->httpDelete("customer_invoices/{$invoiceId}/matched_transactions/{$transactionId}");
    }

    public function appendices(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("customer_invoices/{$invoiceId}/appendices", $params), AppendixResponse::class);
    }

    public function uploadAppendix(int $invoiceId, array $data): AppendixResponse
    {
        return AppendixResponse::fromArray($this->httpPost("customer_invoices/{$invoiceId}/appendices", $data));
    }

    public function categories(int $invoiceId): array
    {
        return $this->httpGet("customer_invoices/{$invoiceId}/categories");
    }

    public function updateCategories(int $invoiceId, array $data): array
    {
        return $this->httpPut("customer_invoices/{$invoiceId}/categories", $data);
    }

    public function customHeaderFields(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("customer_invoices/{$invoiceId}/custom_header_fields", $params), CategoryResponse::class);
    }
}
