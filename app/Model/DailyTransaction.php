<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class DailyTransaction extends Model
{
    protected $table = 'daily_transactions';
    protected $fillable = [
        'reference_number',
        'chart_account_id',
        'credit',
        'debit',
        'particulars',
        'transaction_type_id',
        'teller_id',
        'branch_id',
        'sequence_number',
        'error_correct'
    ];
}
