<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Data\ParagraphData;

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

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->getType()->value,
            'data' => $this->data
        ];
    }
}