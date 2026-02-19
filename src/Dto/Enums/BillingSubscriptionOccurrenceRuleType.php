<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum BillingSubscriptionOccurrenceRuleType: string
{
    case Weekly = 'weekly';
    case Monthly = 'monthly';
    case Yearly = 'yearly';
}
