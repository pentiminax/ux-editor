<?php

namespace Pentiminax\UX\Editor\Model\Data;

class ParagraphData implements \JsonSerializable
{
    public string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function jsonSerialize(): array
    {
        return [
            'text' => $this->text,
        ];
    }
}