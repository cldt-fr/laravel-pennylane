<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum PaymentConditions: string
{
    case UponReceipt = 'upon_receipt';
    case Custom = 'custom';
    case Days7 = '7_days';
    case Days15 = '15_days';
    case Days30 = '30_days';
    case Days30EndOfMonth = '30_days_end_of_month';
    case Days45 = '45_days';
    case Days45EndOfMonth = '45_days_end_of_month';
    case Days60 = '60_days';
}
