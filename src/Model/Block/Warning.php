<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\WarningData;

final class Warning extends AbstractBlock
{
    public static function new(string $title, string $message): self
    {
        return new self(
            data: new WarningData(
                title: $title,
                message: $message
            ),
        );
    }
    public function getType(): BlockType
    {
        return BlockType::WARNING;
    }
}