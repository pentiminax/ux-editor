<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\ListCounterType;
use Pentiminax\UX\Editor\Enum\ListStyle;
use Pentiminax\UX\Editor\Model\Data\ListData;
use Pentiminax\UX\Editor\Model\Data\ListItem;
use Pentiminax\UX\Editor\Model\Data\ListMeta;

class OrderedList extends AbstractBlock
{
    /**
     * @param ListItem[] $items
     */
    public static function new(string $content, array $items = []): static
    {
        return new static(
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