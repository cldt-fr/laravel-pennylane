<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\BankAccountResponse;

class BankAccounts extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('bank_accounts', $params), BankAccountResponse::class);
    }

    public function create(array $data): BankAccountResponse
    {
        return BankAccountResponse::fromArray($this->httpPost('bank_accounts', $data));
    }

    public function get(int $id): BankAccountResponse
    {
        return BankAccountResponse::fromArray($this->httpGet("bank_accounts/{$id}"));
    }
}
