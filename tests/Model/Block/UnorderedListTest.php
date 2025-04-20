<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Block\UnorderedList;
use Pentiminax\UX\Editor\Model\BlockData\ListData;
use Pentiminax\UX\Editor\Model\BlockData\ListItem;
use PHPUnit\Framework\TestCase;

class UnorderedListTest extends TestCase
{
    public function testUnorderedListBlock(): void
    {
        $items = [
            ListItem::new('item 1'),
            ListItem::new('item 2')
        ];

        $block = UnorderedList::new(
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