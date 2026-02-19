<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\SupplierInvoiceResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineResponse;
use CLDT\PennylaneLaravel\Dto\Responses\PaymentResponse;
use CLDT\PennylaneLaravel\Dto\Responses\MatchedTransactionResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CategoryResponse;

class SupplierInvoices extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('supplier_invoices', $params), SupplierInvoiceResponse::class);
    }

    public function import(array $fields = [], array $attachments = []): SupplierInvoiceResponse
    {
        return SupplierInvoiceResponse::fromArray($this->httpPostMultipart('supplier_invoices/import', $fields, $attachments));
    }

    public function get(int $id): SupplierInvoiceResponse
    {
        return SupplierInvoiceResponse::fromArray($this->httpGet("supplier_invoices/{$id}"));
    }

    public function update(int $id, array $data): SupplierInvoiceResponse
    {
        return SupplierInvoiceResponse::fromArray($this->httpPut("supplier_invoices/{$id}", $data));
    }

    public function validateAccounting(int $id): SupplierInvoiceResponse
    {
        return SupplierInvoiceResponse::fromArray($this->httpPut("supplier_invoices/{$id}/validate_accounting"));
    }

    public function invoiceLines(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("supplier_invoices/{$invoiceId}/invoice_lines", $params), InvoiceLineResponse::class);
    }

    public function categories(int $invoiceId): array
    {
        return $this->httpGet("supplier_invoices/{$invoiceId}/categories");
    }

    public function updateCategories(int $invoiceId, array $data): array
    {
        return $this->httpPut("supplier_invoices/{$invoiceId}/categories", $data);
    }

    public function payments(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("supplier_invoices/{$invoiceId}/payments", $params), PaymentResponse::class);
    }

    public function updatePaymentStatus(int $invoiceId, array $data): SupplierInvoiceResponse
    {
        return SupplierInvoiceResponse::fromArray($this->httpPut("supplier_invoices/{$invoiceId}/payment_status", $data));
    }

    public function matchedTransactions(int $invoiceId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("supplier_invoices/{$invoiceId}/matched_transactions", $params), MatchedTransactionResponse::class);
    }

    public function matchTransaction(int $invoiceId, array $data): MatchedTransactionResponse
    {
        return MatchedTransactionResponse::fromArray($this->httpPost("supplier_invoices/{$invoiceId}/matched_transactions", $data));
    }

    public function unmatchTransaction(int $invoiceId, int $transactionId): void
    {
        $this->httpDelete("supplier_invoices/{$invoiceId}/matched_transactions/{$transactionId}");
    }

    public function linkPurchaseRequest(int $invoiceId, array $data): array
    {
        return $this->httpPost("supplier_invoices/{$invoiceId}/linked_purchase_requests", $data);
    }
}
