# Image Block

The `Image` block allows you to display images with optional caption and styling options.

## Features

- Embed an image by URL
- Optional caption
- Display options: stretch, background, border

## Usage

You can create a new image block using the `Image::new()` static constructor:

```php
use Pentiminax\UX\Editor\Model\Block\Image;

$block = Image::new(
    file: 'https://example.com/image.jpg',
    caption: 'A beautiful scenery',
    stretched: true,
    withBackground: false,
    withBorder: true
);
```

## Output

The block will be serialized as:

```json
{
  "type": "image",
  "data": {
    "file": {
      "url": "https://example.com/image.jpg"
    },
    "caption": "A beautiful scenery",
    "stretched": true,
    "withBackground": false,
    "withBorder": true
  }
}
```

