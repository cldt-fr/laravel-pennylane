<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class WebhookSubscriptionResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $url,
        public readonly array $events,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            url: $data['url'] ?? null,
            events: $data['events'] ?? [],
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
