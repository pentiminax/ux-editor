<?php

namespace Pentiminax\UX\Editor\Enum;

enum BlockType: string
{
    case CHECKLIST = 'checklist';
    case CODE = 'code';
    case EMBED = 'embed';
    case HEADER = 'header';
    case IMAGE = 'image';
    case INLINE_CODE = 'inline_code';
    case LIST = 'list';
    case MARKER = 'marker';
    case PARAGRAPH = 'paragraph';
    case TABLE = 'table';
}