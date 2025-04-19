<?php

namespace Pentiminax\UX\Editor\Tests\Model;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Editor;
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
}