<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class ParagraphData implements BlockDataInterface
{
    public function __construct(
        public string $text,
        public bool $inlineCode = false,
        public bool $marker = false
    ) {
        if ($inlineCode && $marker) {
            throw new \InvalidArgumentException('You cannot set both $inlineCode and $marker to true.');
        }
    }

    /**
     * @return array{text: string}
     */
    public function jsonSerialize(): array
    {
        if ($this->inlineCode) {
            $text = sprintf('<code>%s</code>', $this->text);
        }

        if ($this->marker) {
            $text = sprintf('<mark class="cdx-marker">%s</mark>', $this->text);
        }

        return [
            'text' => $text ?? $this->text,
        ];
    }
}