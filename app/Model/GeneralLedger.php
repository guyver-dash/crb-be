<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class GeneralLedger extends Model
{
    
    protected $table = 'general_ledgers';
    protected $fillable = [
        'ledgerable_id',
        'ledgerable_type',
        'transaction_id',
        'particulars',
        'chart_account_id',
        'taccount_id',
        'debit_amount',
        'credit_amount',
        'tax'
    ];


    public function getDebitAmountAttribute($value){

        return (float)$value;
    }

    public function getCreditAmountAttribute($value){

        return (float)$value;
    }

    public function getTaxAttribute($value){

        return (float)$value;
    }
}
