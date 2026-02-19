<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\LedgerEntryLineResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CategoryResponse;

class LedgerEntryLines extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('ledger_entry_lines', $params), LedgerEntryLineResponse::class);
    }

    public function get(int $id): LedgerEntryLineResponse
    {
        return LedgerEntryLineResponse::fromArray($this->httpGet("ledger_entry_lines/{$id}"));
    }

    public function letter(array $data): array
    {
        return $this->httpPost('ledger_entry_lines/lettering', $data);
    }

    public function unletter(array $data): void
    {
        $this->httpDelete('ledger_entry_lines/lettering', $data);
    }

    public function letteredLines(int $lineId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("ledger_entry_lines/{$lineId}/lettered_ledger_entry_lines", $params), LedgerEntryLineResponse::class);
    }

    public function categories(int $lineId, array $params = []): array
    {
        return $this->httpGet("ledger_entry_lines/{$lineId}/categories", $params);
    }

    public function updateCategories(int $lineId, array $data): array
    {
        return $this->httpPut("ledger_entry_lines/{$lineId}/categories", $data);
    }
}
