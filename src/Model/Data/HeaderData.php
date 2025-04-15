<?php

namespace Pentiminax\UX\Editor\Model\Data;

use Pentiminax\UX\Editor\Enum\HeaderLevel;

class HeaderData implements \JsonSerializable
{
    public function __construct(
        private readonly string $text,
        private readonly HeaderLevel $level
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