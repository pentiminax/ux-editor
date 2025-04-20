<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class RawData implements BlockDataInterface
{
    public function __construct(
        public string $html,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'html' => $this->html,
        ];
    }
}