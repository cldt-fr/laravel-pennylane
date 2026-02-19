<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class SupplierInvoiceResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $label,
        public readonly ?string $invoice_number,
        public readonly ?string $currency,
        public readonly ?string $amount,
        public readonly ?string $currency_amount,
        public readonly ?string $currency_amount_before_tax,
        public readonly ?string $exchange_rate,
        public readonly ?string $date,
        public readonly ?string $deadline,
        public readonly ?string $currency_tax,
        public readonly ?string $tax,
        public readonly ?bool $reconciled,
        public readonly ?string $accounting_status,
        public readonly ?string $payment_status,
        public readonly ?string $status,
        public readonly ?string $external_reference,
        public readonly ?string $notes,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            label: $data['label'] ?? null,
            invoice_number: $data['invoice_number'] ?? null,
            currency: $data['currency'] ?? null,
            amount: $data['amount'] ?? null,
            currency_amount: $data['currency_amount'] ?? null,
            currency_amount_before_tax: $data['currency_amount_before_tax'] ?? null,
            exchange_rate: $data['exchange_rate'] ?? null,
            date: $data['date'] ?? null,
            deadline: $data['deadline'] ?? null,
            currency_tax: $data['currency_tax'] ?? null,
            tax: $data['tax'] ?? null,
            reconciled: $data['reconciled'] ?? null,
            accounting_status: $data['accounting_status'] ?? null,
            payment_status: $data['payment_status'] ?? null,
            status: $data['status'] ?? null,
            external_reference: $data['external_reference'] ?? null,
            notes: $data['notes'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
