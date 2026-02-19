<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class GocardlessMandateResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $status,
        public readonly ?string $scheme,
        public readonly ?string $reference,
        public readonly ?array $customer,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            status: $data['status'] ?? null,
            scheme: $data['scheme'] ?? null,
            reference: $data['reference'] ?? null,
            customer: $data['customer'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
