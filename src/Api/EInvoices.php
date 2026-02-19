<?php

namespace CLDT\PennylaneLaravel\Api;

class EInvoices extends BaseApi
{
    public function import(array $fields = [], array $attachments = []): array
    {
        return $this->httpPostMultipart('e-invoices/imports', $fields, $attachments);
    }
}
