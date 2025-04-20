<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\ChecklistData;
use Pentiminax\UX\Editor\Model\BlockData\ChecklistItem;

class Checklist extends AbstractBlock
{
    public static function new(ChecklistItem ...$items): static
    {
        return new static(
            new ChecklistData(...$items)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::CHECKLIST;
    }
}