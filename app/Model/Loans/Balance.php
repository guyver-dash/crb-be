<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    protected $table = 'balances';
    protected $fillable = [
        'loan_id',
        'principal_balance',
        'interest_balance',
        'last_movement_principal',
        'last_movement_interest'
    ];

    public function loans()
    {
        return $this->hasOne('App\Model\Loans\Loan', 'id', 'loan_id');
    }
}
