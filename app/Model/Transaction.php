<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table = 'transactions';
    protected $fillable = [
        'transactable_id', 
        'transactable_type', 
        'transaction_type_id',
        'total_amount',
        'remarks',
        'status'
    ];
}
