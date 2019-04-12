<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    protected $table = 'charges';
    protected $fillable = [
        'chart_account_id',
        'details',
        'amount',
        'rate'
    ];

    public function chartAccount()
    {
        return $this->hasOne('App\Model\ChartAccount', 'id', 'chart_account_id');
    }
}
