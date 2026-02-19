<?php

namespace CLDT\PennylaneLaravel\Dto;

class PaginatedResponse
{
    public function __construct(
        public readonly array $items,
        public readonly bool $has_more,
        public readonly ?string $next_cursor,
    ) {}

    public static function fromArray(array $data, string $dtoClass): self
    {
        $items = $data['items'] ?? [];

        return new self(
            items: array_map(fn(array $item) => $dtoClass::fromArray($item), $items),
            has_more: $data['has_more'] ?? false,
            next_cursor: $data['next_cursor'] ?? null,
        );
    }
}
