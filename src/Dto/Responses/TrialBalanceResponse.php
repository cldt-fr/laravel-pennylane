<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class TrialBalanceResponse
{
    public function __construct(
        public readonly array $accounts,
        public readonly ?string $start_date,
        public readonly ?string $end_date,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            accounts: $data['accounts'] ?? [],
            start_date: $data['start_date'] ?? null,
            end_date: $data['end_date'] ?? null,
        );
    }
}
