<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class ChecklistData implements BlockDataInterface
{
    /** @var ChecklistItem[]  */
    public array $items;

    /**
     * @param ChecklistItem[] $items
     */
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