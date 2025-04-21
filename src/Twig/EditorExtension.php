<?php

namespace Pentiminax\UX\Editor\Twig;

use Pentiminax\UX\Editor\Model\Editor;
use Symfony\UX\StimulusBundle\Helper\StimulusHelper;
use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class EditorExtension extends AbstractExtension
{
    public function __construct(
        private readonly StimulusHelper $stimulus,
    ) {
    }

    public function getFunctions(): array
    {
        return [
            new TwigFunction('render_editor', [$this, 'renderEditor'], ['is_safe' => ['html']]),
        ];
    }

    public function renderEditor(Editor $editor, array $attributes = []): string
    {
        $editor->setAttributes(array_merge($editor->getAttributes(), $attributes));

        $controllers = [];

        if ($editor->getDataController()) {
            $controllers[$editor->getDataController()] = [];
        }

        $controllers['@pentiminax/ux-editor/editor'] = [
            'view' => empty($editor->getOptions())? '{}' : $editor->getOptions()
        ];

        $stimulusAttributes = $this->stimulus->createStimulusAttributes();
        foreach ($controllers as $name => $controllerValues) {
            $stimulusAttributes->addController($name, $controllerValues);
        }

        foreach ($editor->getAttributes() as $name => $value) {
            if ('data-controller' === $name) {
                continue;
            }

            if (true === $value) {
                $stimulusAttributes->addAttribute($name, $name);
            } elseif (false !== $value) {
                $stimulusAttributes->addAttribute($name, $value);
            }
        }

        return \sprintf('<div id="%s" %s></div>', $editor->getId(), $stimulusAttributes);
    }
}