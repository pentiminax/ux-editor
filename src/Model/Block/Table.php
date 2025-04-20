<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\TableData;

final class Table extends AbstractBlock
{
    public static function new(array $content, bool $stretched = false, bool $withHeadings = false): self
    {
        return new self(
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