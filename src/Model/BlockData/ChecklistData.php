<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class ChecklistData implements BlockDataInterface
{
    /** @var ChecklistItem[] $items */
    public array $items;

    /**
     * @param ChecklistItem ...$items
     */
    public function __construct(ChecklistItem ...$items)
    {
        $this->items = $items;
    }

    /**
     * @return array{items: ChecklistItem[]}
     */
    public function jsonSerialize(): array
    {
        return [
            'items' => $this->items
        ];
    }
}