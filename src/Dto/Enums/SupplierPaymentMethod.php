<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum SupplierPaymentMethod: string
{
    case AutomaticTransfer = 'automatic_transfer';
    case ManualTransfer = 'manual_transfer';
    case AutomaticDebiting = 'automatic_debiting';
    case BillOfExchange = 'bill_of_exchange';
    case Check = 'check';
    case Cash = 'cash';
    case Card = 'card';
}
