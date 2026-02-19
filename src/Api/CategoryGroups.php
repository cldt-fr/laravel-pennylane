<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CategoryGroupResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CategoryResponse;

class CategoryGroups extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('category_groups', $params), CategoryGroupResponse::class);
    }

    public function get(int $id): CategoryGroupResponse
    {
        return CategoryGroupResponse::fromArray($this->httpGet("category_groups/{$id}"));
    }

    public function categories(int $categoryGroupId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("category_groups/{$categoryGroupId}/categories", $params), CategoryResponse::class);
    }
}
