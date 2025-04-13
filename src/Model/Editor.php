<?php

namespace Pentiminax\UX\Editor\Model;

class Editor
{
    private array $options = [];

    /**
     * Id of Element that should contain the Editor
     */
    public function holderId(string $holderId): static
    {
        $this->options['holder'] = $holderId;

        return $this;
    }

    /**
     * Previously saved data that should be rendered
     */
    public function data(string $data): static
    {
        $this->options['data'] = $data;

        return $this;
    }

    public function inlineToolbar(bool $inlineToolbar): static
    {
        $this->options['inlineToolbar'] = $inlineToolbar;

        return $this;
    }

    public function getOptions(): array
    {
        return $this->options;
    }
}