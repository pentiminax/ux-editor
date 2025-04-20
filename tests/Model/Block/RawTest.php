<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Block\Raw;
use Pentiminax\UX\Editor\Model\BlockData\RawData;
use PHPUnit\Framework\TestCase;

class RawTest extends TestCase
{
    public function testRawBlock(): void
    {
        $html = '<p>Test</p>';
        $block = Raw::new($html);

        $this->assertSame(BlockType::RAW, $block->getType());

        /** @var RawData $data */
        $data = $block->getData();

        $this->assertSame($html, $data->html);
    }
}