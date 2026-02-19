<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\CustomerInvoiceTemplateResponse;

class CustomerInvoiceTemplates extends BaseApi
{
    public function list(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('customer_invoice_templates', $params), CustomerInvoiceTemplateResponse::class);
    }
}
