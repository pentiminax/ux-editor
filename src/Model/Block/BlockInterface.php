<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;

interface BlockInterface extends \JsonSerializable
{
    public function getData(): mixed;

    public function getId(): string;

    public function getType(): BlockType;

}