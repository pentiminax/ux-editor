<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\ImageData;

final class Image extends AbstractBlock
{
    public static function new(
        string $file,
        string $caption = '',
        bool $stretched = false,
        bool $withBackground = false,
        bool $withBorder = false,
    ): self {
        return new self(
            new ImageData(
                file: $file,
                caption: $caption,
                stretched: $stretched,
                withBackground: $withBackground,
                withBorder: $withBorder,
            )
        );
    }

    public function getType(): BlockType
    {
        return BlockType::IMAGE;
    }
}