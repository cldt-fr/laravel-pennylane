<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\GocardlessMandateResponse;

class GocardlessMandates extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('gocardless_mandates', $params), GocardlessMandateResponse::class);
    }

    public function get(int $id): GocardlessMandateResponse
    {
        return GocardlessMandateResponse::fromArray($this->httpGet("gocardless_mandates/{$id}"));
    }

    public function sendMailRequest(array $data): array
    {
        return $this->httpPost('gocardless_mandates/mail_requests', $data);
    }

    public function cancel(int $mandateId): array
    {
        return $this->httpPost("gocardless_mandates/{$mandateId}/cancellations");
    }

    public function associations(int $mandateId, array $params = []): array
    {
        return $this->httpGet("gocardless_mandates/{$mandateId}/associations", $params);
    }
}
