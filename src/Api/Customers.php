<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CustomerResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CategoryResponse;
use CLDT\PennylaneLaravel\Dto\Responses\ContactResponse;

class Customers extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('customers', $params), CustomerResponse::class);
    }

    public function get(string $id): CustomerResponse
    {
        return CustomerResponse::fromArray($this->httpGet("customers/{$id}"));
    }

    public function categories(string $customerId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("customers/{$customerId}/categories", $params), CategoryResponse::class);
    }

    public function updateCategories(string $customerId, array $data): array
    {
        return $this->httpPut("customers/{$customerId}/categories", $data);
    }

    public function contacts(string $customerId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("customers/{$customerId}/contacts", $params), ContactResponse::class);
    }
}
