<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class TransactionCode extends Model
{
    protected $table = 'transaction_codes';
    protected $fillable = [
        'details',
        'symbol',
        'chart_account_id'
    ];

    public function getTransactionChartAccount($symbol)
    {
        return $this::select('chart_account_id')->where('symbol', $symbol)->first()->chart_account_id;
    }
}
