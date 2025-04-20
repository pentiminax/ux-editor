<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\HeaderLevel;
use Pentiminax\UX\Editor\Model\Block\Header;
use Pentiminax\UX\Editor\Model\BlockData\HeaderData;
use PHPUnit\Framework\TestCase;

class HeaderTest extends TestCase
{
    public function testHeader(): void
    {
        $header = Header::new(
            text: 'Test Header',
            level: HeaderLevel::H1
        );

        $this->assertEquals(BlockType::HEADER, $header->getType());

        /** @var HeaderData $data */
        $data = $header->getData();

        $this->assertSame('Test Header', $data->text);
        $this->assertSame(1, $data->level->value);
    }
}