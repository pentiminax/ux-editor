<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\DelimiterData;

final class Delimiter extends AbstractBlock
{
    public static function new(): self
    {
        return new self(
            data: new DelimiterData(),
        );
    }

    public function getType(): BlockType
    {
        return BlockType::DELIMITER;
    }
}