<?php

namespace Pentiminax\UX\Editor\Model;

class StandardEditor extends Editor
{
    public function __construct(string $id = 'editorjs')
    {
        parent::__construct($id);

        $this->withCodeTool();
        $this->withDelimiterTool();
        $this->withEmbedTool();
        $this->withHeaderTool();
        $this->withChecklistTool();
        $this->withQuoteTool();
        $this->withListTool();
        $this->withMarketTool();
        $this->withInlineCodeTool();
        $this->withRawTool();
        $this->withTableTool();
        $this->withWarningTool();
    }
}