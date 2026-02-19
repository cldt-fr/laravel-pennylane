<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\LedgerEntryResponse;
use CLDT\PennylaneLaravel\Dto\Responses\LedgerEntryLineResponse;

class LedgerEntries extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('ledger_entries', $params), LedgerEntryResponse::class);
    }

    public function create(array $data): LedgerEntryResponse
    {
        return LedgerEntryResponse::fromArray($this->httpPost('ledger_entries', $data));
    }

    public function get(int $id): LedgerEntryResponse
    {
        return LedgerEntryResponse::fromArray($this->httpGet("ledger_entries/{$id}"));
    }

    public function update(int $id, array $data): LedgerEntryResponse
    {
        return LedgerEntryResponse::fromArray($this->httpPut("ledger_entries/{$id}", $data));
    }

    public function ledgerEntryLines(int $entryId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("ledger_entries/{$entryId}/ledger_entry_lines", $params), LedgerEntryLineResponse::class);
    }
}
