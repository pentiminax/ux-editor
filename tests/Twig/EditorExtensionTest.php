<?php

namespace Pentiminax\UX\Editor\Tests\Twig;

use Pentiminax\UX\Editor\Model\Editor;
use Pentiminax\UX\Editor\Tests\Kernel\TwigAppKernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EditorExtensionTest extends KernelTestCase
{
    public function testRenderEditor(): void
    {
        $kernel = new TwigAppKernel('test', true);

        $kernel->boot();

        $container = $kernel->getContainer()->get('test.service_container');

        $rendered = $container->get('test.editor.twig_extension')->renderEditor(new Editor());

        $this->assertSame(
            '<div id="editorjs" data-controller="pentiminax--ux-editor--editor" data-pentiminax--ux-editor--editor-view-value="{}"></div>',
            $rendered
        );
    }
}