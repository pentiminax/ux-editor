<?php

namespace Pentiminax\UX\Editor\Tests\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\EmbedService;
use Pentiminax\UX\Editor\Model\Block\Embed;
use Pentiminax\UX\Editor\Model\BlockData\EmbedData;
use PHPUnit\Framework\TestCase;

class EmbedTest extends TestCase
{
    public function testEmbedBlock(): void
    {
        $embed = Embed::new(
            caption: 'caption',
            url: 'https://www.youtube.com/watch?v=123456',
            height: 200,
            service: EmbedService::YOUTUBE,
            width: 300,
        );

        $this->assertSame(BlockType::EMBED, $embed->getType());

        /** @var EmbedData $data */
        $data = $embed->getData();

        $this->assertSame('caption', $data->caption);
        $this->assertSame('https://www.youtube.com/watch?v=123456', $data->url);
        $this->assertSame(200, $data->height);
        $this->assertSame(EmbedService::YOUTUBE, $data->service);
        $this->assertSame(300, $data->width);
    }
}