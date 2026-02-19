<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\JournalResponse;

class Journals extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('journals', $params), JournalResponse::class);
    }

    public function create(array $data): JournalResponse
    {
        return JournalResponse::fromArray($this->httpPost('journals', $data));
    }

    public function get(int $id): JournalResponse
    {
        return JournalResponse::fromArray($this->httpGet("journals/{$id}"));
    }
}
