<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

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

    /**
     * @return array{
     *  caption: string,
     *  file: array{url: string},
     *  stretched: bool,
     *  withBackground: bool,
     *  withBorder: bool
     * }
     */
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