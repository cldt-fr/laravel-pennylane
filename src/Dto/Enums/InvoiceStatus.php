<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum InvoiceStatus: string
{
    case Archived = 'archived';
    case Incomplete = 'incomplete';
    case Cancelled = 'cancelled';
    case Paid = 'paid';
    case PartiallyPaid = 'partially_paid';
    case PartiallyCancelled = 'partially_cancelled';
    case Upcoming = 'upcoming';
    case Late = 'late';
    case Draft = 'draft';
    case CreditNote = 'credit_note';
}
