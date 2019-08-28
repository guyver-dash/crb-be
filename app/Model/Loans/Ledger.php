<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class Ledger extends Model
{
    protected $table = 'ledgers';
    protected $fillable = [
        'loan_id',
        'teller_id',
        'transaction_code_id',
        'credit',
        'debit',
        'principal',
        'interest',
        'cbu',
        'savings',
        'other_payment',
        'penalty_interest',
        'penalty_due',
        'total_amount',
        'reference_number',
        'error_correct',
        'principal_balance',
        'interest_balance',
        'sequence_number',
        'particulars',
        'manual_or'
    ];

    public function loan()
    {
        return $this->hasOne('App\Model\Loans\Loan', 'id', 'loan_id');
    }

    // public function teller()
    // {
    //     return $this->hasOne('App\Model\User', 'id', 'teller_id');
    // }

    public function transactionDetails()
    {
        return $this->hasOne('App\Model\Loans\TransactionCode', 'id', 'transaction_code_id');
    }

    public function dailyTransaction()
    {
        return $this->hasMany('App\Model\Loans\DailyTransaction', 'reference_number', 'reference_number');
    }

}
