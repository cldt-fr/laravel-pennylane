<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class InvoiceLineSectionResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $title,
        public readonly ?int $rank,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            title: $data['title'] ?? null,
            rank: $data['rank'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
