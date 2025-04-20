<?php

namespace Pentiminax\UX\Editor\Model\BlockData;

use Pentiminax\UX\Editor\Enum\EmbedService;
use function preg_match;
use function sprintf;

class EmbedData implements BlockDataInterface
{
    public function __construct(
        public string $caption,
        public string $url,
        public int $height,
        public EmbedService $service,
        public int $width
    ) {
        $this->url = match ($this->service) {
            EmbedService::GITHUB => $this->handleGithubGistEmbed($this->url),
            EmbedService::YOUTUBE => $this->handleYouTubeEmbed($this->url),
            EmbedService::TWITTER => $this->handleTwitterEmbed($this->url),
        };
    }

    public function jsonSerialize(): array
    {
        return [
            'caption' => $this->caption,
            'embed' => $this->url,
            'height' => $this->height,
            'service' => $this->service->value,
            'width' => $this->width
        ];
    }

    private function handleGithubGistEmbed(string $embed): string
    {
        if (preg_match('/https:\/\/gist\.github\.com\/([\w-]+)\/([a-f0-9]+)/i', $embed, $matches)) {
            $username = $matches[1];
            $gistId = $matches[2];
            $src = "https://gist.github.com/{$username}/{$gistId}.js";
            $html = sprintf('<head><base target="_blank" /></head><body><script src="%s"></script></body>', $src);

            return 'data:text/html;charset=utf-8,' . rawurlencode($html);
        }

        return $embed;
    }

    private function handleTwitterEmbed(string $embed): string
    {
        if (preg_match('/x\.com\/.*\/status\/([0-9]+)/', $embed, $matches)) {
            return sprintf('https://platform.twitter.com/embed/Tweet.html?id=%s', $matches[1], $embed);
        }

        return $embed;
    }

    private function handleYouTubeEmbed(string $embed): string
    {
        if (preg_match('/(?:youtube\.com\/(?:watch\?v=|embed\/)|youtu\.be\/)([a-zA-Z0-9_-]{11})/', $embed, $matches)) {
            return sprintf('https://www.youtube.com/embed/%s', $matches[1]);
        }

        return $embed;
    }
}