<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\DelimiterData;

class Delimiter extends AbstractBlock
{
    public static function new(): static
    {
        return new static(
            data: new DelimiterData(),
        );
    }

    public function getType(): BlockType
    {
        return BlockType::DELIMITER;
    }
}