<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\MarkerData;

class Marker extends AbstractBlock
{
    public static function new(string $text): static
    {
        return new static(
            data: new MarkerData($text),
        );
    }

    public function getType(): BlockType
    {
        return BlockType::MARKER;
    }
}