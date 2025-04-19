<?php

namespace Pentiminax\UX\Editor\Model\Data;

class TableData implements BlockDataInterface
{
    public function __construct(
        public readonly array $content,
        public readonly bool $stretched = false,
        public readonly bool $withHeadings = false,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'content' => $this->content,
            'stretched' => $this->stretched,
            'withHeadings' => $this->withHeadings,
        ];
    }
}