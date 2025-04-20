<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Model\Block\Paragraph;
use Pentiminax\UX\Editor\Model\BlockData\ParagraphData;
use PHPUnit\Framework\TestCase;

class ParagraphTest extends TestCase
{
    public function testParagraphBlock(): void
    {
        $block = Paragraph::new('text');

        /** @var ParagraphData $data */
        $data = $block->getData();

        $this->assertSame('text', $data->text);
    }
}