<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class RawData implements BlockDataInterface
{
    public function __construct(
        public string $html,
    ) {
    }

    /**
     * @return array{html: string}
     */
    public function jsonSerialize(): array
    {
        return [
            'html' => $this->html,
        ];
    }
}