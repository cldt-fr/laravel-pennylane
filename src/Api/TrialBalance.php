<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\Responses\TrialBalanceResponse;

class TrialBalance extends BaseApi
{
    public function get(array $params = []): TrialBalanceResponse
    {
        return TrialBalanceResponse::fromArray($this->httpGet('trial_balance', $params));
    }
}
