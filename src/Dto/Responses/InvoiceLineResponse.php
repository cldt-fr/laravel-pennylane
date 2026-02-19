<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class InvoiceLineResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?float $quantity,
        public readonly ?string $currency_amount,
        public readonly ?string $currency_amount_before_tax,
        public readonly ?string $currency_tax,
        public readonly ?string $vat_rate,
        public readonly ?string $unit,
        public readonly ?array $product,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            quantity: $data['quantity'] ?? null,
            currency_amount: $data['currency_amount'] ?? null,
            currency_amount_before_tax: $data['currency_amount_before_tax'] ?? null,
            currency_tax: $data['currency_tax'] ?? null,
            vat_rate: $data['vat_rate'] ?? null,
            unit: $data['unit'] ?? null,
            product: $data['product'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
