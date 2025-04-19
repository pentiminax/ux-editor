<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\ImageData;

class Image extends AbstractBlock
{
    public static function new(
        string $file,
        string $caption = '',
        bool $stretched = false,
        bool $withBackground = false,
        bool $withBorder = false,
    ): static {
        return new static(
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