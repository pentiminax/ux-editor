# UX Editor

UX Editor is a Symfony bundle integrating the [Editor.js][1] library in Symfony applications.

[1]: https://editorjs.io

## Requirements 
- PHP 8.2 or higher
- StimulusBundle
- Composer

## Installation

Install the library via Composer:

```console
composer require pentiminax/ux-editor
```

You must include the Editor.js library in your frontend, for example by adding the following script tag:
```html
<script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
```

## Documentation
- [Installation](https://github.com/pentiminax/ux-editor/blob/main/docs/installation.md)
- [Usage](https://github.com/pentiminax/ux-editor/blob/main/docs/usage.md)
- [Data Persistence](https://github.com/pentiminax/ux-editor/blob/main/docs/data-persistence.md)

## Supported Blocks

The following Editor.js blocks are supported:

- [x] Checklist  
- [x] Code  
- [X] Delimiter  
- [x] Embed (GitHub, Twitter, YouTube)  
- [x] Header  
- [x] Image (with file upload support)  
- [x] InlineCode  
- [x] List  
- [x] Marker  
- [x] Paragraph  
- [x] Quote  
- [x] Raw 
- [x] Table  
- [x] Warning   
