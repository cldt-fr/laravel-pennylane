<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class LedgerEntryResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $piece_number,
        public readonly ?string $date,
        public readonly ?string $due_date,
        public readonly ?array $journal,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            piece_number: $data['piece_number'] ?? null,
            date: $data['date'] ?? null,
            due_date: $data['due_date'] ?? null,
            journal: $data['journal'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
