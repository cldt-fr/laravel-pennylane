<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class PaymentResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $amount,
        public readonly ?string $currency,
        public readonly ?string $date,
        public readonly ?string $payment_method,
        public readonly ?string $status,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            amount: $data['amount'] ?? null,
            currency: $data['currency'] ?? null,
            date: $data['date'] ?? null,
            payment_method: $data['payment_method'] ?? null,
            status: $data['status'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
