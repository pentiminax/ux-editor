<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class ChecklistItem implements BlockDataInterface
{
    private function __construct(
        public string $text,
        public bool $checked = false
    ) {
    }

    public static function new(string $text, bool $checked = false): self
    {
        return new self(
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