<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum SepaSequenceType: string
{
    case FRST = 'FRST';
    case OOFF = 'OOFF';
    case RCUR = 'RCUR';
    case FNAL = 'FNAL';
}
