<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum QuoteStatus: string
{
    case Pending = 'pending';
    case Accepted = 'accepted';
    case Denied = 'denied';
    case Invoiced = 'invoiced';
    case Expired = 'expired';
}
