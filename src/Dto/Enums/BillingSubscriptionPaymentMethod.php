<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum BillingSubscriptionPaymentMethod: string
{
    case Offline = 'offline';
    case GocardlessDirectDebit = 'gocardless_direct_debit';
}
