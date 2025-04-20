<?php

namespace Model\Block;

use Pentiminax\UX\Editor\Model\Block\Table;
use Pentiminax\UX\Editor\Model\BlockData\TableData;
use PHPUnit\Framework\TestCase;

class TableTest extends TestCase
{
    public function testTableBlock(): void
    {
        $block = Table::new([['a', 'b'], ['c', 'd']]);

        /** @var TableData $data */
        $data = $block->getData();

        $this->assertSame([['a', 'b'], ['c', 'd']], $data->content);
    }
}