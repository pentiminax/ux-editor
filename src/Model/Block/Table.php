<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Data\TableData;

class Table extends AbstractBlock
{
    public static function new(array $content, bool $stretched = false, bool $withHeadings = false): static
    {
        return new static(
            new TableData(
                content: $content,
                stretched: $stretched,
                withHeadings: $withHeadings,
            )
        );
    }

    public function getType(): BlockType
    {
        return BlockType::TABLE;
    }
}