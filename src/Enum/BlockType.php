<?php

namespace Pentiminax\UX\Editor\Enum;

enum BlockType: string
{
    case CHECKLIST = 'checklist';
    case EMBED = 'embed';
    case HEADER = 'header';
    case PARAGRAPH = 'paragraph';
}