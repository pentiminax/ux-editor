<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Data\ParagraphData;

class Paragraph extends AbstractBlock
{
    public function getData(): mixed
    {
        return $this->data;
    }

    /**
     * @param string $data
     */
    public static function new(mixed $data): AbstractBlock
    {
        return new static(new ParagraphData($data));
    }

    public function getType(): BlockType
    {
        return BlockType::PARAGRAPH;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->getType()->value,
            'data' => $this->data
        ];
    }
}