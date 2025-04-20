<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Block\Image;
use Pentiminax\UX\Editor\Model\BlockData\ImageData;
use PHPUnit\Framework\TestCase;

class ImageTest extends TestCase
{
    public function testImageBlock(): void
    {
        $block = Image::new(
            file: 'file.png',
            caption: 'caption',
            stretched: true,
            withBackground: true,
            withBorder: true
        );

        $this->assertSame(BlockType::IMAGE, $block->getType());

        /** @var ImageData $data */
        $data = $block->getData();

        $this->assertSame('file.png', $data->file);
        $this->assertSame('caption', $data->caption);
        $this->assertTrue($data->stretched);
        $this->assertTrue($data->withBackground);
        $this->assertTrue($data->withBorder);
    }
}