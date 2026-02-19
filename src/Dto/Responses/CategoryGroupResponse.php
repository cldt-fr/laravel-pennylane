<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class CategoryGroupResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
