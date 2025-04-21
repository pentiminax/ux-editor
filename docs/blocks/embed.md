# Embed Block

The `Embed` block allows you to include media content from third-party platforms like YouTube, Twitter, or GitHub Gists.

## Features

Use the static `new` method to create an `Embed` block:

```php
Embed::new(string $caption, string $url, int $height, EmbedService $service, int $width): Embed
```

## Usage

You can create a new emmbed block using the `Embed::new()` static constructor:

```php
use Pentiminax\UX\Editor\Model\Block\Embed;
use Pentiminax\UX\Editor\Enum\EmbedService;

$block = Embed::new(
    caption: 'My Symfony tutorial',
    url: 'https://www.youtube.com/embed/abcdefghijk',
    height: 300,
    service: EmbedService::YOUTUBE,
    width: 200
);
```

## Output

The block will be serialized as:

```json
{
  "type": "embed",
  "data": {
    "caption": "My Symfony tutorial",
    "embed": "https://www.youtube.com/embed/abcdefghijk",
    "height": 300,
    "service": "youtube",
    "width": 200
  }
}
```