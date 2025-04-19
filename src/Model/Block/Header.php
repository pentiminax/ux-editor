<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\HeaderLevel;
use Pentiminax\UX\Editor\Model\BlockData\HeaderData;

class Header extends AbstractBlock
{
    public static function new(string $text, HeaderLevel $level): static
    {
        return new static(
            new HeaderData($text, $level)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::HEADER;
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