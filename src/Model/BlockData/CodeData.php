<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class CodeData implements BlockDataInterface
{
    public function __construct(
        public string $code,
    ) {
    }

    /**
     * @return array{code: string}
     */
    public function jsonSerialize(): array
    {
        return [
            'code' => $this->code,
        ];
    }
}