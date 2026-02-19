<?php

namespace CLDT\PennylaneLaravel\Api;

class EInvoices extends BaseApi
{
    public function import(array $data): array
    {
        return $this->httpPost('e-invoices/imports', $data);
    }
}
