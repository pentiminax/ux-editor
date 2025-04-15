<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Data\HeaderData;

class Header extends AbstractBlock
{
    /**
     * @param HeaderData $data
     */
    public static function new(mixed $data): AbstractBlock
    {
        return new static($data);
    }

    public function getData(): mixed
    {
        // TODO: Implement getData() method.
    }

    public function getType(): BlockType
    {
        return BlockType::HEADER;
    }

    public function jsonSerialize(): mixed
    {
        // TODO: Implement jsonSerialize() method.
    }
}