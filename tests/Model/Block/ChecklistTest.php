<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Block\Checklist;
use Pentiminax\UX\Editor\Model\BlockData\ChecklistData;
use Pentiminax\UX\Editor\Model\BlockData\ChecklistItem;
use PHPUnit\Framework\TestCase;

class ChecklistTest extends TestCase
{
    public function testChecklist(): void
    {
        $checklist = Checklist::new(
            ChecklistItem::new('Item 1'),
            ChecklistItem::new('Item 2', true),
        );

        $this->assertEquals(BlockType::CHECKLIST, $checklist->getType());

        /** @var ChecklistData $data */
        $data = $checklist->getData();

        $this->assertSame('Item 1', $data->items[0]->text);
        $this->assertFalse($data->items[0]->checked);

        $this->assertSame('Item 2', $data->items[1]->text);
        $this->assertTrue($data->items[1]->checked);
    }
}