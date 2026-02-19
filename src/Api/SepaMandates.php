<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\SepaMandateResponse;

class SepaMandates extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('sepa_mandates', $params), SepaMandateResponse::class);
    }

    public function create(array $data): SepaMandateResponse
    {
        return SepaMandateResponse::fromArray($this->httpPost('sepa_mandates', $data));
    }

    public function get(int $id): SepaMandateResponse
    {
        return SepaMandateResponse::fromArray($this->httpGet("sepa_mandates/{$id}"));
    }

    public function update(int $id, array $data): SepaMandateResponse
    {
        return SepaMandateResponse::fromArray($this->httpPut("sepa_mandates/{$id}", $data));
    }

    public function delete(int $id): void
    {
        $this->httpDelete("sepa_mandates/{$id}");
    }
}
