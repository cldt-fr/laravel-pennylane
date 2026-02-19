<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\ProductResponse;

class Products extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('products', $params), ProductResponse::class);
    }

    public function create(array $data): ProductResponse
    {
        return ProductResponse::fromArray($this->httpPost('products', $data));
    }

    public function get(string $id): ProductResponse
    {
        return ProductResponse::fromArray($this->httpGet("products/{$id}"));
    }

    public function update(string $id, array $data): ProductResponse
    {
        return ProductResponse::fromArray($this->httpPut("products/{$id}", $data));
    }
}
