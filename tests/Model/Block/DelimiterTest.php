<?php

namespace Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Block\Delimiter;
use PHPUnit\Framework\TestCase;

class DelimiterTest extends TestCase
{
    public function testDelimiterBlock(): void
    {
        $block = Delimiter::new();

        $this->assertEquals(BlockType::DELIMITER, $block->getType());

        $this->assertEmpty($block->getData()->jsonSerialize());
    }
}