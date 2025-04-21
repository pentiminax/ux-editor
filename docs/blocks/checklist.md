# Checklist Block

The `Checklist` block allows you to display a list of checkable items, perfect for to-do lists or action plans.

## Features

- Accepts multiple checklist items
- Each item can be marked as checked or unchecked

## Usage

You can create a new checklist block using the `Checklist::new()` static constructor and `ChecklistItem::new()` to define items:

```php
use Pentiminax\UX\Editor\Model\Block\Checklist;
use Pentiminax\UX\Editor\Model\BlockData\ChecklistItem;

$block = Checklist::new(
    ChecklistItem::new('Buy milk'),
    ChecklistItem::new('Write blog post', true)
);
```

## Output

The block will be serialized as:

```json
{
  "type": "checklist",
  "data": {
    "items": [
      {"checked": false, "text": "Buy milk"},
      {"checked": true, "text": "Write blog post"}
    ]
  }
}
```

