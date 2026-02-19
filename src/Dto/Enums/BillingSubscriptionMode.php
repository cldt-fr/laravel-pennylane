<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum BillingSubscriptionMode: string
{
    case AwaitingValidation = 'awaiting_validation';
    case Finalized = 'finalized';
    case Email = 'email';
}
