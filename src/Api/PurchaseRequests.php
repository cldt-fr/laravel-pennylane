<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\PurchaseRequestResponse;

class PurchaseRequests extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('purchase_requests', $params), PurchaseRequestResponse::class);
    }

    public function get(int $id): PurchaseRequestResponse
    {
        return PurchaseRequestResponse::fromArray($this->httpGet("purchase_requests/{$id}"));
    }

    public function update(int $id, array $data): PurchaseRequestResponse
    {
        return PurchaseRequestResponse::fromArray($this->httpPut("purchase_requests/{$id}", $data));
    }

    public function import(array $data): array
    {
        return $this->httpPost('purchase_requests/imports', $data);
    }
}
