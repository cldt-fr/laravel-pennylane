<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class BillingSubscriptionResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $status,
        public readonly ?string $mode,
        public readonly ?string $currency,
        public readonly ?string $amount,
        public readonly ?string $start_date,
        public readonly ?string $end_date,
        public readonly ?string $payment_conditions,
        public readonly ?string $payment_method,
        public readonly ?string $occurrence_rule_type,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            status: $data['status'] ?? null,
            mode: $data['mode'] ?? null,
            currency: $data['currency'] ?? null,
            amount: $data['amount'] ?? null,
            start_date: $data['start_date'] ?? null,
            end_date: $data['end_date'] ?? null,
            payment_conditions: $data['payment_conditions'] ?? null,
            payment_method: $data['payment_method'] ?? null,
            occurrence_rule_type: $data['occurrence_rule_type'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
