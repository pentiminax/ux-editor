<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\CodeData;

class Code extends AbstractBlock
{
    public static function new(string $code): static
    {
        return new static(
            data: new CodeData($code)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::CODE;
    }
}