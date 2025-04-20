<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\CodeData;

final class Code extends AbstractBlock
{
    public static function new(string $code): self
    {
        return new self(
            data: new CodeData($code)
        );
    }

    public function getType(): BlockType
    {
        return BlockType::CODE;
    }
}