<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class CustomerInvoiceTemplateResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $locale,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            locale: $data['locale'] ?? null,
        );
    }
}
