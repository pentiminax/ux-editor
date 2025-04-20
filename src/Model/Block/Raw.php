<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\RawData;

class Raw extends AbstractBlock
{
    public static function new(string $html): static
    {
        return new static(
            data: new RawData(
                html: $html,
            ),
        );
    }

    public function getType(): BlockType
    {
        return BlockType::RAW;
    }
}