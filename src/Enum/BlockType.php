<?php

namespace Pentiminax\UX\Editor\Enum;

enum BlockType: string
{
    case CHECKLIST = 'checklist';
    case EMBED = 'embed';
    case HEADER = 'header';
    case IMAGE = 'image';
    case LIST = 'list';
    case PARAGRAPH = 'paragraph';
    case TABLE = 'table';
}