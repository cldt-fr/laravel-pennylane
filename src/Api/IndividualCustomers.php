<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\Responses\IndividualCustomerResponse;

class IndividualCustomers extends BaseApi
{
    public function create(array $data): IndividualCustomerResponse
    {
        return IndividualCustomerResponse::fromArray($this->httpPost('individual_customers', $data));
    }

    public function get(string $id): IndividualCustomerResponse
    {
        return IndividualCustomerResponse::fromArray($this->httpGet("individual_customers/{$id}"));
    }

    public function update(string $id, array $data): IndividualCustomerResponse
    {
        return IndividualCustomerResponse::fromArray($this->httpPut("individual_customers/{$id}", $data));
    }
}
