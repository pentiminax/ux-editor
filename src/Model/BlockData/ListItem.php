<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

use Pentiminax\UX\Editor\Model\Block\Block;

class ListItem implements BlockDataInterface
{
    public function __construct(
        public readonly string $content,
        /** @var ListItem[] $items */
        public array $items,
        public ListMeta $meta,
    ) {
    }

    public static function new(string $content, array $items = [], ?ListMeta $meta = null): static
    {
        $meta = $meta ?? new ListMeta();

        return new static($content, $items, $meta);
    }

    public function jsonSerialize(): array
    {
        return [
            'content' => $this->content,
            'items' => $this->items,
            'meta' => $this->meta
        ];
    }
}