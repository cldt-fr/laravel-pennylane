<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum VatRate: string
{
    case FR105 = 'FR_1_05';
    case FR175 = 'FR_1_75';
    case FR09 = 'FR_09';
    case FR21 = 'FR_21';
    case FR40 = 'FR_40';
    case FR50 = 'FR_50';
    case FR55 = 'FR_55';
    case FR60 = 'FR_60';
    case FR65 = 'FR_65';
    case FR85 = 'FR_85';
    case FR92 = 'FR_92';
    case FR100 = 'FR_100';
    case FR130 = 'FR_130';
    case FR15385 = 'FR_15_385';
    case FR160 = 'FR_160';
    case FR196 = 'FR_196';
    case FR200 = 'FR_200';
    case BE60 = 'BE_60';
    case BE120 = 'BE_120';
    case BE210 = 'BE_210';
    case DE70 = 'DE_70';
    case DE190 = 'DE_190';
    case Exempt = 'exempt';
    case Extracom = 'extracom';
    case Intracom21 = 'intracom_21';
    case Intracom55 = 'intracom_55';
    case Intracom85 = 'intracom_85';
    case Intracom100 = 'intracom_100';
    case Crossborder = 'crossborder';
    case FR85Construction = 'FR_85_construction';
    case FR100Construction = 'FR_100_construction';
    case FR200Construction = 'FR_200_construction';
}
