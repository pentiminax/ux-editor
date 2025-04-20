<?php

namespace Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Block\OrderedList;
use Pentiminax\UX\Editor\Model\BlockData\ListData;
use Pentiminax\UX\Editor\Model\BlockData\ListItem;
use PHPUnit\Framework\TestCase;

class OrderedListTest extends TestCase
{
    public function testOrderedListBlock(): void
    {
        $items = [
            ListItem::new('item 1'),
            ListItem::new('item 2')
        ];

        $block = OrderedList::new(
            content: 'content',
            items: $items
        );

        $this->assertEquals(BlockType::LIST, $block->getType());

        /** @var ListData $data */
        $data = $block->getData();

        $this->assertSame('content', $data->content);
        $this->assertSame($items, $data->items);
    }
}