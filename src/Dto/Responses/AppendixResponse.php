<?php

namespace CLDT\PennylaneLaravel\Dto\Responses;

class AppendixResponse
{
    public function __construct(
        public readonly int $id,
        public readonly ?string $filename,
        public readonly ?string $url,
        public readonly ?string $content_type,
        public readonly ?string $created_at,
        public readonly ?string $updated_at,
    ) {}

    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            filename: $data['filename'] ?? null,
            url: $data['url'] ?? null,
            content_type: $data['content_type'] ?? null,
            created_at: $data['created_at'] ?? null,
            updated_at: $data['updated_at'] ?? null,
        );
    }
}
