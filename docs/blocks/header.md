# Header Block

The `Header` block allows you to render headings with different levels (from `<h1>` to `<h6>`) within your Editor.js integration in Symfony.

## Features

- Supports all HTML header levels (h1 to h6) via `HeaderLevel` enum
- Clean structure and easy instantiation

## Usage

You can create a new header block using the `Header::new()` static constructor:

```php
use Pentiminax\UX\Editor\Model\Block\Header;
use Pentiminax\UX\Editor\Enum\HeaderLevel;

$block = Header::new('This is a title', HeaderLevel::H2);
```

> 📝 The `HeaderLevel` enum contains values from `H1` to `H6`.

## Output

The block will be serialized as:

```json
{
  "type": "header",
  "data": {
    "level": 2,
    "text": "This is a title"
  }
}
```