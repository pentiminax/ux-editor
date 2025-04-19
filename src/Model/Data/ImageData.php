<?php

namespace Pentiminax\UX\Editor\Model\Data;

class ImageData implements BlockDataInterface
{
    public function __construct(
        public readonly string $file,
        public readonly string $caption = '',
        public readonly bool $stretched = false,
        public readonly bool $withBackground = false,
        public readonly bool $withBorder = false,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'caption' => $this->caption,
            'file' => [
                'url' => $this->file,
            ],
            'stretched' => $this->stretched,
            'withBackground' => $this->withBackground,
            'withBorder' => $this->withBorder,
        ];
    }
}