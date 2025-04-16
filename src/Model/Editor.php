<?php

namespace Pentiminax\UX\Editor\Model;

use Pentiminax\UX\Editor\Enum\BlockType;
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
    public function holder(string $holderId): static
    {
        $this->options['holder'] = $holderId;

        return $this;
    }

    public function autofocus(bool $autofocus): static
    {
        $this->options['autofocus'] = $autofocus;

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

    public function defaultBlock(BlockType $blockType): static
    {
        $this->options['defaultBlock'] = $blockType->value;

        return $this;
    }

    public function minHeight(int $minHeight): static
    {
        $this->options['minHeight'] = $minHeight;

        return $this;
    }

    public function inlineToolbar(bool $inlineToolbar): static
    {
        $this->options['inlineToolbar'] = $inlineToolbar;

        return $this;
    }

    /**
     * Enable read-only mode
     */
    public function readonly(bool $readonly): static
    {
        $this->options['readOnly'] = $readonly;

        return $this;
    }

    public function hideToolbar(bool $hideToolbar): static
    {
        $this->options['hideToolbar'] = $hideToolbar;

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