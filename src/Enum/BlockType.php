<?php

namespace Pentiminax\UX\Editor\Enum;

enum BlockType: string
{
    case CHECKLIST = 'checklist';
    case CODE = 'code';
    case EMBED = 'embed';
    case HEADER = 'header';
    case IMAGE = 'image';
    case LIST = 'list';
    case PARAGRAPH = 'paragraph';
    case TABLE = 'table';
}