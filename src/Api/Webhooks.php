<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\Responses\WebhookSubscriptionResponse;

class Webhooks extends BaseApi
{
    public function get(): WebhookSubscriptionResponse
    {
        return WebhookSubscriptionResponse::fromArray($this->httpGet('webhook_subscription'));
    }
}
