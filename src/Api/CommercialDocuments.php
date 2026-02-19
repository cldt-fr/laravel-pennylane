<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CommercialDocumentResponse;
use CLDT\PennylaneLaravel\Dto\Responses\AppendixResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineSectionResponse;

class CommercialDocuments extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('commercial_documents', $params), CommercialDocumentResponse::class);
    }

    public function get(int $id): CommercialDocumentResponse
    {
        return CommercialDocumentResponse::fromArray($this->httpGet("commercial_documents/{$id}"));
    }

    public function appendices(int $documentId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("commercial_documents/{$documentId}/appendices", $params), AppendixResponse::class);
    }

    public function uploadAppendix(int $documentId, array $data): AppendixResponse
    {
        return AppendixResponse::fromArray($this->httpPost("commercial_documents/{$documentId}/appendices", $data));
    }

    public function invoiceLines(int $documentId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("commercial_documents/{$documentId}/invoice_lines", $params), InvoiceLineResponse::class);
    }

    public function invoiceLineSections(int $documentId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("commercial_documents/{$documentId}/invoice_line_sections", $params), InvoiceLineSectionResponse::class);
    }
}
