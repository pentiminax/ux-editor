<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\ParagraphData;

final class Paragraph extends AbstractBlock
{
    public static function new(string $text, bool $inlineCode = false, bool $marker = false): self
    {
        if ($inlineCode && $marker) {
            throw new \InvalidArgumentException('You cannot set both $inlineCode and $marker to true.');
        }

        return new self(
            data: new ParagraphData(
                text: $text,
                inlineCode: $inlineCode,
                marker: $marker
            )
        );
    }

    public function getType(): BlockType
    {
        return BlockType::PARAGRAPH;
    }
}