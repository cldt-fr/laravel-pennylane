<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class IndividualCustomerResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $first_name,
        public readonly ?string $last_name,
        public readonly ?string $billing_iban,
        public readonly ?string $payment_conditions,
        public readonly ?string $recipient,
        public readonly ?string $phone,
        public readonly ?string $reference,
        public readonly ?string $notes,
        public readonly ?string $vat_number,
        public readonly ?string $reg_no,
        public readonly array $emails,
        public readonly ?array $billing_address,
        public readonly ?array $delivery_address,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
        public readonly ?string $customer_type,
        public readonly ?string $external_reference,
        public readonly ?string $billing_language,
        public readonly ?string $gender,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            first_name: $data['first_name'] ?? null,
            last_name: $data['last_name'] ?? null,
            billing_iban: $data['billing_iban'] ?? null,
            payment_conditions: $data['payment_conditions'] ?? null,
            recipient: $data['recipient'] ?? null,
            phone: $data['phone'] ?? null,
            reference: $data['reference'] ?? null,
            notes: $data['notes'] ?? null,
            vat_number: $data['vat_number'] ?? null,
            reg_no: $data['reg_no'] ?? null,
            emails: $data['emails'] ?? [],
            billing_address: $data['billing_address'] ?? null,
            delivery_address: $data['delivery_address'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
            customer_type: $data['customer_type'] ?? null,
            external_reference: $data['external_reference'] ?? null,
            billing_language: $data['billing_language'] ?? null,
            gender: $data['gender'] ?? null,
        );
    }
}
