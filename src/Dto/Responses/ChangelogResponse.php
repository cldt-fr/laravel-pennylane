<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class ChangelogResponse
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $event_type,
        public readonly ?int $resource_id,
        public readonly ?string $resource_type,
        public readonly ?string $occurred_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'] ?? null,
            event_type: $data['event_type'] ?? null,
            resource_id: $data['resource_id'] ?? null,
            resource_type: $data['resource_type'] ?? null,
            occurred_at: $data['occurred_at'] ?? null,
        );
    }
}
