<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class Amortization extends Model
{
    protected $table = 'amortizations';
    protected $fillable = [
        'loan_id',
        'payment_date',
        'principal',
        'interest',
        'cbu',
        'savings',
        'other_payment',
        'total_payment',
        'posted',
        'date_paid',
        'principal_pay',
        'interest_pay',
        'cbu_pay',
        'savings_pay',
        'other_payment_pay',
        'balance'
    ];
}
