<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum PaymentStatus: string
{
    case Initiated = 'initiated';
    case Pending = 'pending';
    case Emitted = 'emitted';
    case Found = 'found';
    case NotFound = 'not_found';
    case Aborted = 'aborted';
    case Error = 'error';
    case Refunded = 'refunded';
    case Prepared = 'prepared';
    case PendingCustomerApproval = 'pending_customer_approval';
    case PendingSubmission = 'pending_submission';
    case Submitted = 'submitted';
    case Confirmed = 'confirmed';
    case PaidOut = 'paid_out';
    case Cancelled = 'cancelled';
    case CustomerApprovalDenied = 'customer_approval_denied';
    case Failed = 'failed';
    case ChargedBack = 'charged_back';
    case ResubmissionRequested = 'resubmission_requested';
}
