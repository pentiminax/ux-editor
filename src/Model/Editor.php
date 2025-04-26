<?php

namespace Pentiminax\UX\Editor\Model;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Enum\EditorLogLevel;
use Pentiminax\UX\Editor\Enum\HeaderLevel;
use Pentiminax\UX\Editor\Enum\ListStyle;
use Pentiminax\UX\Editor\Model\Block\BlockInterface;

class Editor
{
    /**
     * @var array<string, mixed> $attributes
     */
    private array $attributes = [];

    /**
     * @var array{
     *  holder?: string,
     *  autofocus?: bool,
     *  data?: array{blocks: BlockInterface[]},
     *  defaultBlock?: string,
     *  minHeight?: int,
     *  inlineToolbar?: bool,
     *  readOnly?: bool,
     * } $options
     */
    private array $options = [];

    public function __construct(
        private readonly string $id = 'editorjs'
    ) {
        $this->holder($this->id);
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

    public function addBlock(BlockInterface $block): static
    {
        $this->options['data']['blocks'][] = $block;

        return $this;
    }

    /**
     * Previously saved blocks that should be rendered
     * @param BlockInterface[] $blocks
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

    public function logLevel(EditorLogLevel $logLevel): static
    {
        $this->options['logLevel'] = $logLevel->value;

        return $this;
    }

    public function loadDataUrl(string $loadDataUrl): static
    {
        $this->options['loadDataUrl'] = $loadDataUrl;

        return $this;
    }

    public function saveDataUrl(string $saveDataUrl): static
    {
        $this->options['saveDataUrl'] = $saveDataUrl;

        return $this;
    }

    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array<string, mixed>
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array<string, mixed> $attributes
     */
    public function setAttributes(array $attributes): static
    {
        $this->attributes = $attributes;

        return $this;
    }

    public function getDataController(): ?string
    {
        if (isset($this->attributes['data-controller'])
            && is_string($this->attributes['data-controller'])
        ) {
            return $this->attributes['data-controller'];
        }

        return null;
    }

    /**
     * @return array<string, mixed>
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function withChecklistTool(): static
    {
        $this->options['checklist'] = true;

        return $this;
    }

    public function withCodeTool(): static
    {
        $this->options['code'] = true;

        return $this;
    }

    public function withDelimiterTool(): static
    {
        $this->options['delimiter'] = true;

        return $this;
    }

    public function withEmbedTool(): static
    {
        $this->options['embed'] = true;

        return $this;
    }

    /**
     * @param HeaderLevel[] $levels
     */
    public function withHeaderTool(string $placeholder = '', array $levels = [], HeaderLevel $defaultLevel = HeaderLevel::H1): static
    {
        if ([] === $levels) {
            $levels = HeaderLevel::cases();
        }

        $this->options['header'] = [
            'config' => [
                'placeholder' => $placeholder,
                'levels' => array_map(fn (HeaderLevel $level) => $level->value, $levels),
                'defaultLevel' => $defaultLevel->value,
            ]
        ];

        return $this;
    }

    public function withImageTool(string $byFileEndpoint, ?string $byUrlEndpoint = null): static
    {
        $this->options['image'] = [
            'config' => [
                'endpoints' => [
                    'byFile' => $byFileEndpoint,
                    'byUrl' => $byUrlEndpoint
                ]
            ]
        ];

        return $this;
    }

    public function withInlineCodeTool(): static
    {
        $this->options['inlineCode'] = true;

        return $this;
    }

    public function withListTool(ListStyle $defaultStyle = ListStyle::UNORDERED): static
    {
        $this->options['list'] = [
            'config' => [
                'defaultStyle' => $defaultStyle->value,
            ]
        ];

        return $this;
    }

    public function withMarketTool(): static
    {
        $this->options['marker'] = true;

        return $this;
    }

    public function withQuoteTool(string $quotePlaceholder = '', string $captionPlaceholder = ''): static
    {
        $this->options['quote'] = [
            'config' => [
                'quotePlaceholder' => $quotePlaceholder,
                'captionPlaceholder' => $captionPlaceholder,
            ]
        ];

        return $this;
    }

    public function withRawTool(string $placeholder = ''): static
    {
        $this->options['raw'] = [
            'config' => [
                'placeholder' => $placeholder,
            ]
        ];

        return $this;
    }

    public function withTableTool(
        int $rows = 2,
        int $cols = 2,
        int $maxRows = 5,
        int $maxCols = 5,
    ): static {
        $this->options['table'] = [
            'config' => [
                'rows' => $rows,
                'cols' => $cols,
                'maxRows' => $maxRows,
                'maxCols' => $maxCols,
            ]
        ];

        return $this;
    }

    public function withWarningTool(string $titlePlaceholder = '', string $messagePlaceholder = ''): static
    {
        $this->options['warning'] = [
            'config' => [
                'titlePlaceholder' => $titlePlaceholder,
                'messagePlaceholder' => $messagePlaceholder,
            ]
        ];

        return $this;
    }
}