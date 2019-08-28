<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class LoanCharge extends Model
{
    protected $table = 'loan_charges';
    protected $fillable = [
        'charge_id',
        'loan_id',
        'amount'
    ];

    public function loans()
    {
        return $this->hasOne('App\Model\Loans\Loan', 'id', 'loan_id');
    }

    public function charge()
    {
        return $this->hasOne('App\Model\Loans\Charge', 'id', 'charge_id');
    }
}
