<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum InvoiceAccountingStatus: string
{
    case Draft = 'draft';
    case Archived = 'archived';
    case Entry = 'entry';
    case ValidationNeeded = 'validation_needed';
    case Complete = 'complete';
}
