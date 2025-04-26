<?php

namespace Pentiminax\UX\Editor\Tests\Twig;

use Pentiminax\UX\Editor\Model\Editor;
use Pentiminax\UX\Editor\Tests\Kernel\TwigAppKernel;
use Pentiminax\UX\Editor\Twig\EditorExtension as TwigEditorExtension;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\DependencyInjection\ContainerInterface;

class EditorExtensionTest extends KernelTestCase
{
    public function testRenderEditor(): void
    {
        $kernel = new TwigAppKernel('test', true);

        $kernel->boot();

        /** @var ContainerInterface $container */
        $container = $kernel->getContainer()->get('test.service_container');

        $twigExtension = $container->get('test.editor.twig_extension');
        $this->assertInstanceOf(TwigEditorExtension::class, $twigExtension);

        $rendered = $twigExtension->renderEditor(new Editor());

        $this->assertSame(
            '<div id="editorjs" data-controller="pentiminax--ux-editor--editor" data-pentiminax--ux-editor--editor-view-value="{&quot;holder&quot;:&quot;editorjs&quot;}"></div>',
            $rendered
        );
    }
}