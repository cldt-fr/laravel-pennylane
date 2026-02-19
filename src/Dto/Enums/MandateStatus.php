<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum MandateStatus: string
{
    case PendingCustomerApproval = 'pending_customer_approval';
    case PendingSubmission = 'pending_submission';
    case Submitted = 'submitted';
    case Active = 'active';
    case Failed = 'failed';
    case Cancelled = 'cancelled';
    case Expired = 'expired';
    case Consumed = 'consumed';
    case Replaced = 'replaced';
    case Blocked = 'blocked';
    case BankDisconnected = 'bank_disconnected';
}
