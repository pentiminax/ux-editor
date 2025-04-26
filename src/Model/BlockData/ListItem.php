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

    /**
     * @param ListItem[] $items
     */
    public static function new(string $content, array $items = [], ?ListMeta $meta = null): self
    {
        $meta = $meta ?? new ListMeta();

        return new self($content, $items, $meta);
    }

    /**
     * @return array{content: string, items: ListItem[], meta: ListMeta}
     */
    public function jsonSerialize(): array
    {
        return [
            'content' => $this->content,
            'items' => $this->items,
            'meta' => $this->meta
        ];
    }
}