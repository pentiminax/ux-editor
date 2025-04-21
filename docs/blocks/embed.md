## Embed Block

The `Embed` block allows you to include media content from third-party platforms like YouTube, Twitter, or GitHub Gists.

### Instantiation

Use the static `new` method to create an `Embed` block:

```php
Embed::new(string $caption, string $url, int $height, EmbedService $service, int $width): Embed
```

# Embed Block Documentation

## Description

Le bloc `Embed` permet d’intégrer des contenus provenant de services externes comme YouTube, Twitter ou GitHub Gists directement dans l’éditeur. Ce bloc prend en charge l’intégration de contenus via des URL et ajuste automatiquement le format selon le service sélectionné.

## Méthode de Création

### `Embed::new(string $caption, string $url, int $height, EmbedService $service, int $width): Embed`

Crée une nouvelle instance du bloc `Embed` avec les paramètres fournis.

### Parameters

| Name       | Type             | Description                                                                 |
|------------|------------------|-----------------------------------------------------------------------------|
| `$caption` | `string`         | Caption for the embedded content.                                           |
| `$url`     | `string`         | URL of the content to embed.                                                |
| `$height`  | `int`            | Height of the embedded player in pixels.                                    |
| `$service` | `EmbedService`   | The external service to use for embedding (`YOUTUBE`, `TWITTER`, `GITHUB`).  |
| `$width`   | `int`            | Width of the embedded player in pixels.                                     |

### Example

```php
use Pentiminax\UX\Editor\Model\Block\Embed;
use Pentiminax\UX\Editor\Enum\EmbedService;

$embedBlock = Embed::new(
    caption: "My Symfony Tutorial",
    url: "https://www.youtube.com/watch?v=abcdefghijk",
    height: 315,
    service: EmbedService::YOUTUBE,
    width: 560
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
    "height": 315,
    "service": "youtube",
    "width": 560
  }
}
```