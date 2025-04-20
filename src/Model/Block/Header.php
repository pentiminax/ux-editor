<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\HeaderLevel;
use Pentiminax\UX\Editor\Model\BlockData\HeaderData;

final class Header extends AbstractBlock
{
    public static function new(string $text, HeaderLevel $level): self
    {
        return new self(
            new HeaderData($text, $level)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::HEADER;
    }
}