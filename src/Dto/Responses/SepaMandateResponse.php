<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class SepaMandateResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $status,
        public readonly ?string $reference,
        public readonly ?string $sequence_type,
        public readonly ?string $debtor_name,
        public readonly ?string $debtor_iban,
        public readonly ?string $debtor_bic,
        public readonly ?string $signing_date,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            status: $data['status'] ?? null,
            reference: $data['reference'] ?? null,
            sequence_type: $data['sequence_type'] ?? null,
            debtor_name: $data['debtor_name'] ?? null,
            debtor_iban: $data['debtor_iban'] ?? null,
            debtor_bic: $data['debtor_bic'] ?? null,
            signing_date: $data['signing_date'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
