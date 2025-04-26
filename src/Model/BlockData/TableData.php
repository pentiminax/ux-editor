<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

class TableData implements BlockDataInterface
{
    /**
     * @param array<int, list<string>> $content
     */
    public function __construct(
        public readonly array $content,
        public readonly bool $stretched = false,
        public readonly bool $withHeadings = false,
    ) {
    }

    /**
     * @return array{content: array<int, list<string>>, stretched: bool, withHeadings: bool}
     */
    public function jsonSerialize(): array
    {
        return [
            'content' => $this->content,
            'stretched' => $this->stretched,
            'withHeadings' => $this->withHeadings,
        ];
    }
}