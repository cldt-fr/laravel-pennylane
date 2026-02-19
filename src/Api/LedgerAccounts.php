<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\LedgerAccountResponse;

class LedgerAccounts extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('ledger_accounts', $params), LedgerAccountResponse::class);
    }

    public function create(array $data): LedgerAccountResponse
    {
        return LedgerAccountResponse::fromArray($this->httpPost('ledger_accounts', $data));
    }

    public function get(int $id): LedgerAccountResponse
    {
        return LedgerAccountResponse::fromArray($this->httpGet("ledger_accounts/{$id}"));
    }

    public function update(int $id, array $data): LedgerAccountResponse
    {
        return LedgerAccountResponse::fromArray($this->httpPut("ledger_accounts/{$id}", $data));
    }
}
