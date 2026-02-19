<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum CategoryDirection: string
{
    case CashIn = 'cash_in';
    case CashOut = 'cash_out';
}
