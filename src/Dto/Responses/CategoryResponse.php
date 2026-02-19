<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class CategoryResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $direction,
        public readonly ?string $analytical_code,
        public readonly ?float $weight,
        public readonly ?array $category_group,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            direction: $data['direction'] ?? null,
            analytical_code: $data['analytical_code'] ?? null,
            weight: $data['weight'] ?? null,
            category_group: $data['category_group'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
