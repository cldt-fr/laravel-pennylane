<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class TransactionResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?bool $attachment_required,
        public readonly ?string $date,
        public readonly ?string $outstanding_balance,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
        public readonly ?string $archived_at,
        public readonly ?string $currency,
        public readonly ?string $amount,
        public readonly ?array $bank_account,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            attachment_required: $data['attachment_required'] ?? null,
            date: $data['date'] ?? null,
            outstanding_balance: $data['outstanding_balance'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            archived_at: $data['archived_at'] ?? null,
            currency: $data['currency'] ?? null,
            amount: $data['amount'] ?? null,
            bank_account: $data['bank_account'] ?? null,
        );
    }
}
