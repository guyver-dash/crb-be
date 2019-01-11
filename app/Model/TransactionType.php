<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TransactionType extends Model
{
    
    protected $table = 'transaction_types';
    protected $fillable = [
            'name',
            'desc',
            'company_id',
            'chart_account_id',
            'trans_code'
    ];
}
