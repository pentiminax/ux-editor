<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

use Pentiminax\UX\Editor\Enum\ListCounterType;

class ListMeta implements \JsonSerializable
{
    public function __construct(
        public ?ListCounterType $counterType = null
    ) {
    }

    public function jsonSerialize(): array
    {
        return [
            'counterType' => $this->counterType,
        ];
    }
}