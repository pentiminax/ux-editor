<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

use Pentiminax\UX\Editor\Enum\ListStyle;
use Pentiminax\UX\Editor\Model\BlockData\ListItem;

class ListData implements BlockDataInterface
{
    /**
     * @param ListItem[] $items
     */
    public function __construct(
        public string $content,
        public array $items,
        public ListStyle $style,
        public ?ListMeta $meta = null
    ) {
    }

    public function jsonSerialize(): mixed
    {
        $items = [];

        $items[] = [
            'content' => $this->content,
            'items' => $this->items,
            'meta' => $this->meta ?? new ListMeta()
        ];

        return [
            'items' => $items,
            'meta' => $this->meta ?? new ListMeta(),
            'style' => $this->style,
        ];
    }
}