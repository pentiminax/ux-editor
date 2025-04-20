<?php

namespace Pentiminax\UX\Editor\Tests\Model\BlockData;

use Pentiminax\UX\Editor\Model\BlockData\ParagraphData;
use PHPUnit\Framework\TestCase;

class ParagraphDataTest extends TestCase
{
    public function testParagraphDataWhenInlineCodeAnMarkerAreTrueThenExpectException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        new ParagraphData(
            text: 'Hello World',
            inlineCode: true,
            marker: true
        );
    }

    public function testParagraphDataWhenInlineCodeIsTrueThenExpectTextToBeWrappedInCodeTag(): void
    {
        $paragraphData = new ParagraphData(
            text: 'Hello World',
            inlineCode: true
        );

        $this->assertEquals(
            '<code>Hello World</code>',
            $paragraphData->jsonSerialize()['text']
        );
    }

    public function testParagraphDataWhenInlineCodeIsFalseThenExpectException(): void
    {
        $paragraphData = new ParagraphData(
            text: 'Hello World',
            marker: true
        );

        $this->assertEquals(
            '<mark class="cdx-marker">Hello World</mark>',
            $paragraphData->jsonSerialize()['text']
        );
    }
}