<?php

namespace CLDT\PennylaneLaravel\Dto\Enums;

enum AccountType: string
{
    case Current = 'current';
    case Card = 'card';
    case Savings = 'savings';
    case Shares = 'shares';
    case Loan = 'loan';
    case LifeInsurance = 'life_insurance';
    case Other = 'other';
    case Checking = 'checking';
}
