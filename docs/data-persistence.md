# Data Persistence

This document explains how data persistence works with the integration of Editor.js using Symfony and Stimulus. It is based on two main components:

1. **The JavaScript Stimulus Controller**, responsible for managing the editor on the client side.
2. **The PHP `Editor` class**, used to configure and initialize the editor on the server side.

## 1. Overview

Data saving and loading is handled via two main configuration options:

- `loadDataUrl`: the URL from which previously saved editor data can be loaded.
- `saveDataUrl`: the URL to which data will be automatically saved when the user leaves the page (`beforeunload` event).

## 2. Saving Mechanism (JavaScript)

In the Stimulus controller:

- On page unload (`beforeunload`), the controller automatically triggers the `save()` method.
- If `saveDataUrl` is defined, a POST request is sent to that endpoint with the editor content as JSON.
- If `saveDataUrl` is not provided, the content is stored in `localStorage` under the key `editorContent`.

```js
window.addEventListener('beforeunload', async (e) => {
    await this.save();
});
```

## 3. Loading Mechanism (JavaScript)

Data is loaded in the following order of precedence:

- If loadDataUrl is set, the editor fetches the content from this URL.
- If blocks are passed as part of the payload, they are parsed and used.
- Otherwise, data is fetched from localStorage.

## 4. Symfony PHP Integration
The Editor PHP class helps configure the Editor.js instance server-side.

To enable saving and loading via endpoints, you can use:

```php
$editor
    ->loadDataUrl('/api/editor/load/123')
    ->saveDataUrl('/api/editor/save/123');
```

## 5. Example: Saving in Controller (Symfony)

```js
#[Route('/api/editor/save/{id}', name: 'editor_save', methods: ['POST'])]
public function save(Request $request, string $id): Response
{
    $data = json_decode($request->getContent(), true);

    // Save $data in the database or any storage

    return new JsonResponse(['status' => 'success']);
}
```
