<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\Responses\CompanyCustomerResponse;

class CompanyCustomers extends BaseApi
{
    public function create(array $data): CompanyCustomerResponse
    {
        return CompanyCustomerResponse::fromArray($this->httpPost('company_customers', $data));
    }

    public function get(string $id): CompanyCustomerResponse
    {
        return CompanyCustomerResponse::fromArray($this->httpGet("company_customers/{$id}"));
    }

    public function update(string $id, array $data): CompanyCustomerResponse
    {
        return CompanyCustomerResponse::fromArray($this->httpPut("company_customers/{$id}", $data));
    }
}
