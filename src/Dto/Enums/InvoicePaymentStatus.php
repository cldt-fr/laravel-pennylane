<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum InvoicePaymentStatus: string
{
    case ToBeProcessed = 'to_be_processed';
    case ToBePaid = 'to_be_paid';
    case PartiallyPaid = 'partially_paid';
    case PaymentError = 'payment_error';
    case PaymentScheduled = 'payment_scheduled';
    case PaymentInProgress = 'payment_in_progress';
    case PaymentEmitted = 'payment_emitted';
    case PaymentFound = 'payment_found';
    case PaidOffline = 'paid_offline';
    case FullyPaid = 'fully_paid';
}
