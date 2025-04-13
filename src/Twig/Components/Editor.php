<?php

use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\TwigComponent\Attribute\ExposeInTemplate;

class Editor
{
    #[LiveProp]
    public string $placeholder = "Let`s write an awesome story!";

    #[ExposeInTemplate('viewValues', getter: 'getViewValues')]
    private array $viewValues = [];

    public function getViewValues(): array
    {
        return [
            'placeholder' => $this->placeholder,
        ];
    }
}