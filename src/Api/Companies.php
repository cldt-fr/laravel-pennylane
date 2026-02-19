<?php

namespace CLDT\PennylaneLaravel\Api;

class Companies extends BaseApi
{
    public function create(array $data): array
    {
        return $this->httpPost('companies', $data);
    }

    public function completeRegistration(int $id, array $data): array
    {
        return $this->httpPut("companies/{$id}/complete_registration", $data);
    }
}
