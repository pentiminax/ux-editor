<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

readonly class WarningData implements BlockDataInterface
{
    public function __construct(
        public string $title,
        public string $message,
    ) {
    }

    /**
     * @return array{message: string, title: string}
     */
    public function jsonSerialize(): array
    {
        return [
            'title' => $this->title,
            'message' => $this->message,
        ];
    }
}