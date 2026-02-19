<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\BillingSubscriptionResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineSectionResponse;
use CLDT\PennylaneLaravel\Dto\Responses\InvoiceLineResponse;

class BillingSubscriptions extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('billing_subscriptions', $params), BillingSubscriptionResponse::class);
    }

    public function create(array $data): BillingSubscriptionResponse
    {
        return BillingSubscriptionResponse::fromArray($this->httpPost('billing_subscriptions', $data));
    }

    public function get(int $id): BillingSubscriptionResponse
    {
        return BillingSubscriptionResponse::fromArray($this->httpGet("billing_subscriptions/{$id}"));
    }

    public function update(int $id, array $data): BillingSubscriptionResponse
    {
        return BillingSubscriptionResponse::fromArray($this->httpPut("billing_subscriptions/{$id}", $data));
    }

    public function invoiceLineSections(int $subscriptionId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("billing_subscriptions/{$subscriptionId}/invoice_line_sections", $params), InvoiceLineSectionResponse::class);
    }

    public function invoiceLines(int $subscriptionId, array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet("billing_subscriptions/{$subscriptionId}/invoice_lines", $params), InvoiceLineResponse::class);
    }
}
