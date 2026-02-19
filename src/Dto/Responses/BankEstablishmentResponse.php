<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class BankEstablishmentResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $name,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            name: $data['name'] ?? null,
        );
    }
}
