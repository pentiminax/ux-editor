<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\ChecklistData;
use Pentiminax\UX\Editor\Model\BlockData\ChecklistItem;

final class Checklist extends AbstractBlock
{
    public static function new(ChecklistItem ...$items): self
    {
        return new self(
            new ChecklistData(...$items)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::CHECKLIST;
    }
}