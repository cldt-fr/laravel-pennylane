<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum CommercialDocumentType: string
{
    case Proforma = 'proforma';
    case ShippingOrder = 'shipping_order';
    case PurchasingOrder = 'purchasing_order';
}
