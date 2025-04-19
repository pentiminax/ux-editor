<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\ListStyle;
use Pentiminax\UX\Editor\Model\BlockData\ListData;
use Pentiminax\UX\Editor\Model\BlockData\ListItem;

class UnorderedList extends AbstractBlock
{
    /**
     * @param ListItem[] $items
     */
    public static function new(string $content, array $items = []): static
    {
        return new static(
            new ListData($content, $items, ListStyle::UNORDERED)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::LIST;
    }
}