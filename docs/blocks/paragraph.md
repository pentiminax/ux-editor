# Paragraph Block

The `Paragraph` block allows you to represent text content within your Editor.js integration in Symfony.

## Features

- Render plain text
- Render inline code (`<code>`)
- Render marked text (`<mark>`)

You can’t use both inline code and marker formatting at the same time — trying to do so will result in an exception.

## Usage

You can create a new paragraph block using the `Paragraph::new()` static constructor:

```php
use Pentiminax\UX\Editor\Model\Block\Paragraph;

// Plain text
$block = Paragraph::new('This is a simple paragraph.');

// Inline code
$block = Paragraph::new('This will be highlighted as code.', inlineCode: true);

// Marked text
$block = Paragraph::new('This will be marked.', marker: true);

⚠️ Note: You cannot set both inlineCode and marker to true. This will throw an InvalidArgumentException.

## Output

The block will be serialized as:


```json
{
  "type": "paragraph",
  "data": {
    "text": "This is a simple paragraph."
  }
}
```

If `inlineCode` or  `marker` is used, the text will be wrapped accordingly:

```json
{
  "type": "paragraph",
  "data": {
    "text": "<code>This will be highlighted as code.</code>"
  }
}
```

```json
{
  "type": "paragraph",
  "data": {
    "text": "<mark class=\"cdx-marker\">This will be marked.</mark>"
  }
}
```