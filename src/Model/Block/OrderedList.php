<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\ListCounterType;
use Pentiminax\UX\Editor\Enum\ListStyle;
use Pentiminax\UX\Editor\Model\BlockData\ListData;
use Pentiminax\UX\Editor\Model\BlockData\ListItem;
use Pentiminax\UX\Editor\Model\BlockData\ListMeta;

final class OrderedList extends AbstractBlock
{
    /**
     * @param ListItem[] $items
     */
    public static function new(string $content, array $items = []): self
    {
        return new self(
            new ListData(
                content: $content,
                items: $items,
                style: ListStyle::ORDERED,
                meta: new ListMeta(ListCounterType::NUMERIC)
            ),
        );
    }

    public function getType(): BlockType
    {
        return BlockType::LIST;
    }
}