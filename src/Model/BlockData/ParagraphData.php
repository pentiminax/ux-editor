<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class ParagraphData implements BlockDataInterface, \JsonSerializable
{
    public function __construct(
        public string $text
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'text' => $this->text,
        ];
    }
}