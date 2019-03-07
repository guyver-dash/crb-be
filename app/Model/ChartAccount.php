<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    protected $table = 'chart_accounts';
    protected $fillable = [
        'parent_id',
        'name',
        'account_code',
        'normal_balance_id',
        'account_display',
        'remarks'
    ];
}
