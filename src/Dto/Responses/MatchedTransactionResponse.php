<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class MatchedTransactionResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?int $transaction_id,
        public readonly ?string $amount,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            transaction_id: $data['transaction_id'] ?? null,
            amount: $data['amount'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
