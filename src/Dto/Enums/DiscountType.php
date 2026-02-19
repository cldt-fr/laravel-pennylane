<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum DiscountType: string
{
    case Absolute = 'absolute';
    case Relative = 'relative';
}
