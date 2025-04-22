<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\BlockData\BlockDataInterface;

abstract class AbstractBlock implements BlockInterface
{
    protected string $id;

    protected BlockDataInterface $data;

    protected function __construct(BlockDataInterface $data)
    {
        $this->data = $data;
    }

    abstract public function getType(): BlockType;

    public function getData(): BlockDataInterface
    {
        return $this->data;
    }

    public function jsonSerialize(): array
    {
        return [
            'type' => $this->getType()->value,
            'data' => $this->getData()
        ];
    }
}