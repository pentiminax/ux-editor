<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Model\Block\Code;
use Pentiminax\UX\Editor\Model\BlockData\CodeData;
use PHPUnit\Framework\TestCase;

class CodeTest extends TestCase
{
    public function testCodeBlock(): void
    {
        $block = Code::new('$x = 1;');

        /** @var CodeData $data */
        $data = $block->getData();

        $this->assertSame('$x = 1;', $data->code);
    }
}