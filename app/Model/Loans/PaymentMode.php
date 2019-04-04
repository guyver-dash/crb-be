<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class PaymentMode extends Model
{
    protected $table = 'payment_modes';
    protected $fillable = [
        'details',
        'days'
    ];
}
