<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class QuoteResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $quote_number,
        public readonly ?string $currency,
        public readonly ?string $amount,
        public readonly ?string $currency_amount,
        public readonly ?string $status,
        public readonly ?string $date,
        public readonly ?string $expiration_date,
        public readonly ?string $notes,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            quote_number: $data['quote_number'] ?? null,
            currency: $data['currency'] ?? null,
            amount: $data['amount'] ?? null,
            currency_amount: $data['currency_amount'] ?? null,
            status: $data['status'] ?? null,
            date: $data['date'] ?? null,
            expiration_date: $data['expiration_date'] ?? null,
            notes: $data['notes'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
