<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum ProductUnit: string
{
    case Piece = 'piece';
    case Hour = 'hour';
    case Day = 'day';
    case Month = 'month';
    case Kilogram = 'kilogram';
    case M2 = 'm2';
    case M3 = 'm3';
    case Ton = 'ton';
    case Mg = 'mg';
    case NoUnit = 'no_unit';
}
