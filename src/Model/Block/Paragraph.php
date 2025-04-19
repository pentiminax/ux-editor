<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\ParagraphData;

class Paragraph extends AbstractBlock
{
    public static function new(string $text): static
    {
        return new static(
            new ParagraphData($text)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::PARAGRAPH;
    }
}