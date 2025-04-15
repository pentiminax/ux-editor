<?php

namespace Pentiminax\UX\Editor\Model\Data;

final readonly class ChecklistItem implements \JsonSerializable
{

    private function __construct(
        public string $text,
        public bool $checked = false
    ) {
    }

    public static function new(string $text, bool $checked = false): static
    {
        return new static(
            $text,
            $checked
        );
    }


    public function jsonSerialize(): array
    {
        return [
            'checked' => $this->checked,
            'text' => $this->text,
        ];
    }
}