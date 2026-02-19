<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class SupplierResponse
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly ?string $establishment_no,
        public readonly ?string $reg_no,
        public readonly ?string $vat_number,
        public readonly array $emails,
        public readonly ?string $iban,
        public readonly ?array $postal_address,
        public readonly ?string $supplier_payment_method,
        public readonly ?int $supplier_due_date_delay,
        public readonly ?string $supplier_due_date_rule,
        public readonly ?string $external_reference,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'],
            establishment_no: $data['establishment_no'] ?? null,
            reg_no: $data['reg_no'] ?? null,
            vat_number: $data['vat_number'] ?? null,
            emails: $data['emails'] ?? [],
            iban: $data['iban'] ?? null,
            postal_address: $data['postal_address'] ?? null,
            supplier_payment_method: $data['supplier_payment_method'] ?? null,
            supplier_due_date_delay: $data['supplier_due_date_delay'] ?? null,
            supplier_due_date_rule: $data['supplier_due_date_rule'] ?? null,
            external_reference: $data['external_reference'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
