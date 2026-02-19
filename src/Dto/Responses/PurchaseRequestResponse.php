<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class PurchaseRequestResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $status,
        public readonly ?string $amount,
        public readonly ?string $currency,
        public readonly ?string $date,
        public readonly ?array $supplier,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            status: $data['status'] ?? null,
            amount: $data['amount'] ?? null,
            currency: $data['currency'] ?? null,
            date: $data['date'] ?? null,
            supplier: $data['supplier'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
