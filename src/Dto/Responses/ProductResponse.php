<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class ProductResponse
{
    public function __construct(
        public readonly int $id,
        public readonly string $label,
        public readonly ?string $description,
        public readonly ?string $external_reference,
        public readonly ?string $price_before_tax,
        public readonly ?string $vat_rate,
        public readonly ?string $price,
        public readonly ?string $unit,
        public readonly ?string $currency,
        public readonly ?string $reference,
        public readonly ?string $archived_at,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'],
            description: $data['description'] ?? null,
            external_reference: $data['external_reference'] ?? null,
            price_before_tax: $data['price_before_tax'] ?? null,
            vat_rate: $data['vat_rate'] ?? null,
            price: $data['price'] ?? null,
            unit: $data['unit'] ?? null,
            currency: $data['currency'] ?? null,
            reference: $data['reference'] ?? null,
            archived_at: $data['archived_at'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
