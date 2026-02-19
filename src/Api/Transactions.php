<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\TransactionResponse;

class Transactions extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('transactions', $params), TransactionResponse::class);
    }

    public function create(array $data): TransactionResponse
    {
        return TransactionResponse::fromArray($this->httpPost('transactions', $data));
    }

    public function get(int $id): TransactionResponse
    {
        return TransactionResponse::fromArray($this->httpGet("transactions/{$id}"));
    }

    public function update(int $id, array $data): TransactionResponse
    {
        return TransactionResponse::fromArray($this->httpPut("transactions/{$id}", $data));
    }

    public function categories(int $transactionId, array $params = []): array
    {
        return $this->httpGet("transactions/{$transactionId}/categories", $params);
    }

    public function updateCategories(int $transactionId, array $data): array
    {
        return $this->httpPut("transactions/{$transactionId}/categories", $data);
    }

    public function matchedInvoices(int $transactionId, array $params = []): array
    {
        return $this->httpGet("transactions/{$transactionId}/matched_invoices", $params);
    }
}
