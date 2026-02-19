<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class FiscalYearResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $start_date,
        public readonly ?string $end_date,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            start_date: $data['start_date'] ?? null,
            end_date: $data['end_date'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
