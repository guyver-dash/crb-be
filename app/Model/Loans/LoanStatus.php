<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class LoanStatus extends Model
{
    protected $table = 'loan_status';
    protected $fillable = [
        'details'
    ];
}
