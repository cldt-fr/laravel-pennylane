<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\SupplierResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CategoryResponse;

class Suppliers extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('suppliers', $params), SupplierResponse::class);
    }

    public function create(array $data): SupplierResponse
    {
        return SupplierResponse::fromArray($this->httpPost('suppliers', $data));
    }

    public function get(int $id): SupplierResponse
    {
        return SupplierResponse::fromArray($this->httpGet("suppliers/{$id}"));
    }

    public function update(int $id, array $data): SupplierResponse
    {
        return SupplierResponse::fromArray($this->httpPut("suppliers/{$id}", $data));
    }

    public function categories(int $supplierId, array $params = []): array
    {
        return $this->httpGet("suppliers/{$supplierId}/categories", $params);
    }

    public function updateCategories(int $supplierId, array $data): array
    {
        return $this->httpPut("suppliers/{$supplierId}/categories", $data);
    }
}
