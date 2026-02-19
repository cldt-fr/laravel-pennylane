<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\QuoteResponse;
use CLDT\PennylaneLaravel\Dto\Responses\AppendixResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineSectionResponse;

class Quotes extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('quotes', $params), QuoteResponse::class);
    }

    public function create(array $data): QuoteResponse
    {
        return QuoteResponse::fromArray($this->httpPost('quotes', $data));
    }

    public function get(int $id): QuoteResponse
    {
        return QuoteResponse::fromArray($this->httpGet("quotes/{$id}"));
    }

    public function update(int $id, array $data): QuoteResponse
    {
        return QuoteResponse::fromArray($this->httpPut("quotes/{$id}", $data));
    }

    public function appendices(int $quoteId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("quotes/{$quoteId}/appendices", $params), AppendixResponse::class);
    }

    public function uploadAppendix(int $quoteId, array $data): AppendixResponse
    {
        return AppendixResponse::fromArray($this->httpPost("quotes/{$quoteId}/appendices", $data));
    }

    public function invoiceLines(int $quoteId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("quotes/{$quoteId}/invoice_lines", $params), InvoiceLineResponse::class);
    }

    public function invoiceLineSections(int $quoteId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("quotes/{$quoteId}/invoice_line_sections", $params), InvoiceLineSectionResponse::class);
    }

    public function sendByEmail(int $id, array $data): array
    {
        return $this->httpPost("quotes/{$id}/send_by_email", $data);
    }

    public function updateStatus(int $id, array $data): QuoteResponse
    {
        return QuoteResponse::fromArray($this->httpPut("quotes/{$id}/update_status", $data));
    }
}
