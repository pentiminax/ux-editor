# Warning Block

The `Warning` block allows you to display important alerts or messages with a title and a description.

## Features

- Renders a title and a message
- Useful for highlighting warnings or key information

## Usage

You can create a new warning block using the `Warning::new()` static constructor:

```php
use Pentiminax\UX\Editor\Model\Block\Warning;

$block = Warning::new('Important!', 'You should back up your work regularly.');
```

## Output

The block will be serialized as:

```json
{
  "type": "warning",
  "data": {
    "title": "Important!",
    "message": "You should back up your work regularly."
  }
}
```

