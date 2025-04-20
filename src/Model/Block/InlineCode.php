<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\InlineCodeData;

class InlineCode extends AbstractBlock
{
    public static function new(string $text): self
    {
        return new static(
            data: new InlineCodeData($text),
        );
    }

    public function getType(): BlockType
    {
        return BlockType::INLINE_CODE;
    }
}