<?php

namespace Pentiminax\UX\Editor\Tests\Model;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Editor;
use Pentiminax\UX\Editor\Model\StandardEditor;
use PHPUnit\Framework\TestCase;

class EditorTest extends TestCase
{
    public function testEditor(): void
    {
        $editor = (new Editor())
            ->autofocus(true)
            ->blocks([])
            ->defaultBlock(BlockType::TABLE)
            ->hideToolbar(true)
            ->inlineToolbar(true)
            ->minHeight(100)
            ->holder('holderId')
            ->readonly(true)
        ;

        $this->assertSame([
            'autofocus' => true,
            'data' => [
                'blocks' => [],
            ],
            'defaultBlock' => BlockType::TABLE->value,
            'hideToolbar' => true,
            'inlineToolbar' => true,
            'minHeight' => 100,
            'holder' => 'holderId',
            'readOnly' => true,
        ], $editor->getOptions());
    }

    public function testStandardEditor(): void
    {
        $editor = new StandardEditor();

        $options = $editor->getOptions();

        $this->assertArrayHasKey('embed', $options);
        $this->assertArrayHasKey('header', $options);
        $this->assertArrayHasKey('checklist', $options);
        $this->assertArrayHasKey('quote', $options);
        $this->assertArrayHasKey('list', $options);
        $this->assertArrayHasKey('table', $options);
    }
}