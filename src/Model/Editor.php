<?php

namespace Pentiminax\UX\Editor\Model;

use Pentiminax\UX\Editor\MarkdownConverter;

class Editor
{
    private array $attributes = [];

    private array $options = [];

    public function __construct(
        private readonly string $id = 'editorjs'
    ) {
    }

    /**
     * Id of Element that should contain the Editor
     */
    public function holderId(string $holderId): static
    {
        $this->options['holder'] = $holderId;

        return $this;
    }

    /**
     * Previously saved blocks that should be rendered
     */
    public function blocks(array $blocks): static
    {
        $this->options['data']['blocks'] = $blocks;

        return $this;
    }

    public function inlineToolbar(bool $inlineToolbar): static
    {
        $this->options['inlineToolbar'] = $inlineToolbar;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getAttributes(): array
    {
        return $this->attributes;
    }

    public function setAttributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function getDataController(): ?string
    {
        return $this->attributes['data-controller'] ?? null;
    }

    public function getOptions(): array
    {
        return $this->options;
    }

    public function toMarkdown(): string
    {
        return MarkdownConverter::convertToMarkdown($this->options['data']['blocks']);
    }
}