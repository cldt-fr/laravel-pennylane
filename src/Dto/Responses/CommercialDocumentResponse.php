<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class CommercialDocumentResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $document_type,
        public readonly ?string $currency,
        public readonly ?string $amount,
        public readonly ?string $date,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            document_type: $data['document_type'] ?? null,
            currency: $data['currency'] ?? null,
            amount: $data['amount'] ?? null,
            date: $data['date'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
