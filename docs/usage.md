# Usage

## Initialization

To use **UX Editor**, start by instantiating the `Editor` class in your Symfony controller or service:

```php
use Pentiminax\UX\Editor\Model\Editor;
use Pentiminax\UX\Editor\Model\Block\Paragraph;

$editor = (new Editor('my-editor'))
    ->holder('editor-container')
    ->autofocus(true)
    ->minHeight(300)
    ->addBlock(Paragraph::new('Welcome to Editor.js!', HeaderLevel:H1));
```

## Rendering in Twig

Use the render_editor Twig function to render the editor:

```twig
{{ render_editor(editor) }}
```

## Configuration Options

The Editor class provides several methods to configure the behavior and appearance of the editor:

| Method                 | Description                                        |
|------------------------|----------------------------------------------------|
| `holder(string)`       | Set the DOM element ID where the editor will mount |
| `autofocus(bool)`      | Automatically focus the editor on load             |
| `inlineToolbar(bool)`  | Enable inline toolbar for selected blocks          |
| `defaultBlock(string)` | Set the default block type                         |
| `minHeight(int)`       | Set minimum height for the editor in pixels        |
| `readonly(bool)`       | Make the editor read-only                          |
| `hideToolbar(bool)`    | Hide the floating toolbar (when supported)         |
| `blocks(array)`        | Add a list of blocks as initial content            |
| `addBlock(Block)`      | Add a single block to the editor                   |

## Saving Data

By default, the Stimulus controller:
•	Automatically saves the editor data to localStorage on unload (if no saveDataUrl is configured)
•	Sends the data to a backend URL via fetch if saveDataUrl is provided

You can extend this behavior in JavaScript if needed.

## Custom JavaScript Behavior

You can listen to lifecycle events to customize the editor via your own Stimulus controller:

```js
export default class extends Controller {
    connect() {
        this.element.addEventListener('editor:pre-connect', this._onPreConnect);
        this.element.addEventListener('editor:connect', this._onConnect);
    }

    disconnect() {
        this.element.removeEventListener('editor:pre-connect', this._onPreConnect);
        this.element.removeEventListener('editor:connect', this._onConnect);
    }

    _onPreConnect(event) {
        console.log('Editor config:', event.detail.config);
    }

    _onConnect(event) {
        console.log('Editor instance:', event.detail.editor);
    }
}
```

Attach your controller in Twig like this:

```twig
{{ render_editor(editor, {'data-controller': 'editor'}) }}
```