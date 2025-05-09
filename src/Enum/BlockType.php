<?php

namespace Pentiminax\UX\Editor\Enum;

enum BlockType: string
{
    case CHECKLIST = 'checklist';
    case CODE = 'code';
    case DELIMITER = 'delimiter';
    case EMBED = 'embed';
    case HEADER = 'header';
    case IMAGE = 'image';
    case INLINE_CODE = 'inline_code';
    case LIST = 'list';
    case MARKER = 'marker';
    case PARAGRAPH = 'paragraph';
    case RAW = 'raw';
    case TABLE = 'table';
    case WARNING = 'warning';
}