<?php

namespace Pentiminax\UX\Editor\Model\Data;

readonly class ChecklistData implements BlockDataInterface, \JsonSerializable
{
    /** @var ChecklistItem[]  */
    public array $items;

    public function __construct(ChecklistItem ...$items)
    {
        $this->items = $items;
    }

    public function jsonSerialize(): array
    {
        return [
            'items' => $this->items
        ];
    }
}