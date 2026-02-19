<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class BankAccountResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $name,
        public readonly ?string $currency,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
        public readonly ?array $bank_establishment,
        public readonly ?array $journal,
        public readonly ?array $ledger_account,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'] ?? null,
            currency: $data['currency'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            bank_establishment: $data['bank_establishment'] ?? null,
            journal: $data['journal'] ?? null,
            ledger_account: $data['ledger_account'] ?? null,
        );
    }
}
