<?php

namespace CLDT\PennylaneLaravel\Api;

use CLDT\PennylaneLaravel\Dto\PaginatedResponse;
use CLDT\PennylaneLaravel\Dto\Responses\ChangelogResponse;

class Changelogs extends BaseApi
{
    public function customerInvoices(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('changelogs/customer_invoices', $params), ChangelogResponse::class);
    }

    public function supplierInvoices(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('changelogs/supplier_invoices', $params), ChangelogResponse::class);
    }

    public function customers(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('changelogs/customers', $params), ChangelogResponse::class);
    }

    public function suppliers(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('changelogs/suppliers', $params), ChangelogResponse::class);
    }

    public function products(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('changelogs/products', $params), ChangelogResponse::class);
    }

    public function ledgerEntryLines(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('changelogs/ledger_entry_lines', $params), ChangelogResponse::class);
    }

    public function transactions(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('changelogs/transactions', $params), ChangelogResponse::class);
    }

    public function quotes(array $params = []): PaginatedResponse
    {
        return PaginatedResponse::fromArray($this->httpGet('changelogs/quotes', $params), ChangelogResponse::class);
    }
}
