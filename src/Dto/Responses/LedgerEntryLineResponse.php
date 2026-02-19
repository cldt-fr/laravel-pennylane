<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class LedgerEntryLineResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $amount,
        public readonly ?string $currency,
        public readonly ?string $debit,
        public readonly ?string $credit,
        public readonly ?string $lettering_reference,
        public readonly ?array $ledger_account,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            amount: $data['amount'] ?? null,
            currency: $data['currency'] ?? null,
            debit: $data['debit'] ?? null,
            credit: $data['credit'] ?? null,
            lettering_reference: $data['lettering_reference'] ?? null,
            ledger_account: $data['ledger_account'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
