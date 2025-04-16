<?php

namespace Pentiminax\UX\Editor\Model\Data;

readonly class ParagraphData implements \JsonSerializable
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