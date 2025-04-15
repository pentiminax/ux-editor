<?php

namespace Pentiminax\UX\Editor\Model\Data;

use Pentiminax\UX\Editor\Enum\HeaderLevel;

class HeaderData implements \JsonSerializable
{
    private string $text;
    private HeaderLevel $level;

    public function jsonSerialize(): array
    {
        return [
            'level' => $this->level->value,
            'text' => $this->text
        ];
    }
}