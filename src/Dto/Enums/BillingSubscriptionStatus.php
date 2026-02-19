<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum BillingSubscriptionStatus: string
{
    case Draft = 'draft';
    case Stopped = 'stopped';
    case Finished = 'finished';
    case Pending = 'pending';
    case NotStarted = 'not_started';
    case InProgress = 'in_progress';
}
