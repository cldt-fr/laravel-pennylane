<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum ExportStatus: string
{
    case Pending = 'pending';
    case Ready = 'ready';
    case Error = 'error';
}
