<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

class CodeData implements BlockDataInterface
{
    public function __construct(
        protected string $code,
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'code' => $this->code,
        ];
    }
}