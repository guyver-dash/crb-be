<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class LoanLevel extends Model
{
    protected $table = 'loan_levels';
    protected $fillable = [
        'details'
    ];
}
