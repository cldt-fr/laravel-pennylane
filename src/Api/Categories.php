<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CategoryResponse;

class Categories extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('categories', $params), CategoryResponse::class);
    }

    public function create(array $data): CategoryResponse
    {
        return CategoryResponse::fromArray($this->httpPost('categories', $data));
    }

    public function get(int $id): CategoryResponse
    {
        return CategoryResponse::fromArray($this->httpGet("categories/{$id}"));
    }

    public function update(int $id, array $data): CategoryResponse
    {
        return CategoryResponse::fromArray($this->httpPut("categories/{$id}", $data));
    }
}
