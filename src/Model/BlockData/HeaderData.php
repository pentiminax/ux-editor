<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

use Pentiminax\UX\Editor\Enum\HeaderLevel;

class HeaderData implements BlockDataInterface
{
    public function __construct(
        public readonly string $text,
        public readonly HeaderLevel $level
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'level' => $this->level->value,
            'text' => $this->text
        ];
    }
}