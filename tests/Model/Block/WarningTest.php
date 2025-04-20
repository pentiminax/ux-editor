<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Model\Block\Warning;
use Pentiminax\UX\Editor\Model\BlockData\WarningData;
use PHPUnit\Framework\TestCase;

class WarningTest extends TestCase
{
    public function testWarning(): void
    {
        $title = 'Title';
        $message = 'Message';
        $block = Warning::new($title, $message);

        /** @var WarningData $data */
        $data = $block->getData();

        $this->assertSame($title, $data->title);
        $this->assertSame($message, $data->message);
    }
}