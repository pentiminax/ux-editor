<?php

namespace Pentiminax\UX\Editor\Model\Data;

class ChecklistData implements \JsonSerializable
{
    /** @var ChecklistItem[]  */
    private array $items;

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