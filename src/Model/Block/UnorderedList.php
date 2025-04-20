<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\ListStyle;
use Pentiminax\UX\Editor\Model\BlockData\ListData;
use Pentiminax\UX\Editor\Model\BlockData\ListItem;

final class UnorderedList extends AbstractBlock
{
    /**
     * @param ListItem[] $items
     */
    public static function new(string $content, array $items = []): self
    {
        return new self(
            new ListData($content, $items, ListStyle::UNORDERED)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::LIST;
    }
}