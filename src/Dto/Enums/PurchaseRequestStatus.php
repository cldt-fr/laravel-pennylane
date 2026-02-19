<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum PurchaseRequestStatus: string
{
    case ToBeValidated = 'to_be_validated';
    case Approved = 'approved';
    case Rejected = 'rejected';
    case Invoiced = 'invoiced';
}
