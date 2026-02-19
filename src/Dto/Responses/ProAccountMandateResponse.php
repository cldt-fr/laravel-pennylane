<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class ProAccountMandateResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $status,
        public readonly ?string $reference,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            status: $data['status'] ?? null,
            reference: $data['reference'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
