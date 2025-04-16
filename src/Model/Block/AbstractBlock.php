<?php

namespace Pentiminax\UX\Editor\Model\Block;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Data\BlockDataInterface;

abstract class AbstractBlock implements BlockInterface, \JsonSerializable
{
    protected string $id;

    protected mixed $data;

    public function __construct(mixed $data)
    {
        $this->id = self::generateBlockId();
        $this->data = $data;
    }

    abstract public function getType(): BlockType;

    public function getData(): BlockDataInterface
    {
        return $this->data;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->getType()->value,
            'data' => $this->getData()
        ];
    }

    private static function generateBlockId(): string
    {
        $timestampMs = (string)round(microtime(true) * 1000);
        $chars = '0123456789abcdefghijklmnopqrstuvwxyz';

        $timestampBase36 = '';
        $timestamp = $timestampMs;
        while ($timestamp !== '0') {
            $remainder = bcmod($timestamp, '36');
            $timestampBase36 = $chars[(int)$remainder] . $timestampBase36;
            $timestamp = bcdiv($timestamp, '36', 0);
        }

        $randomPart = '';
        $bytes = random_bytes(5);
        for ($i = 0; $i < 5; $i++) {
            $randomPart .= $chars[ord($bytes[$i]) % 36];
        }

        return $timestampBase36 . $randomPart;
    }
}