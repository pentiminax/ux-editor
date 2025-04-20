<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class CodeData implements BlockDataInterface
{
    public function __construct(
        public string $code,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'code' => $this->code,
        ];
    }
}