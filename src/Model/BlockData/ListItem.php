<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

class ListItem implements BlockDataInterface
{
    public function __construct(
        public readonly string $content,
        /** @var ListItem[] $items */
        public array $items,
        public ListMeta $meta,
    ) {
    }

    public static function new(string $content, array $items = [], ?ListMeta $meta = null): self
    {
        $meta = $meta ?? new ListMeta();

        return new self($content, $items, $meta);
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