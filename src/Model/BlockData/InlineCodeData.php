<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class InlineCodeData implements BlockDataInterface
{
    public function __construct(
        public string $text,
    ) {
    }

    public function jsonSerialize(): mixed
    {
        return [
            'text' => $this->text,
        ];
    }
}