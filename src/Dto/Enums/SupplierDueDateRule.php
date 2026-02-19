<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum SupplierDueDateRule: string
{
    case Days = 'days';
    case DaysOrEndOfMonth = 'days_or_end_of_month';
}
