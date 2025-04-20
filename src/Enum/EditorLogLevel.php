<?php

namespace Pentiminax\UX\Editor\Enum;

enum EditorLogLevel: string
{
    case VERBOSE = 'VERBOSE';
    case INFO = 'INFO';
    case WARN = 'WARN';
    case ERROR = 'ERROR';
}