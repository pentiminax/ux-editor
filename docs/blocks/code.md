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

# Code Block

The `Code` block allows you to include a snippet of code inside your content.

## Features

- Displays plain code text
- No syntax highlighting

## Usage

You can create a new code block using the `Code::new()` static constructor:

```php
use Pentiminax\UX\Editor\Model\Block\Code;

$block = Code::new(
    code: '<?php echo "Hello world!"; ?>'
);
```

## Output

The block will be serialized as:

```json
{
  "type": "code",
  "data": {
    "code": "<?php echo \"Hello world!\"; ?>"
  }
}
```