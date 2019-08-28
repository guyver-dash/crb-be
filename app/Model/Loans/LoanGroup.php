<?php

namespace App\Model\Loans;

use Illuminate\Database\Eloquent\Model;

class LoanGroup extends Model
{
    protected $table = 'loan_groups';
    protected $fillable = [
        'loan_id',
        'loancategory_id',
        'officer_id',
        'collector_id',
        'groups_id',
        'barangay_id',
        'lending_id',
        'office_id',
        'economic_id',
        'subproject_id'
    ];

    public function loanCode()
    {
        return $this->hasOne('App\Model\MasterSetup\LoanCode', 'id', 'loancategory_id');
    }

    public function officer()
    {
        return $this->hasOne('App\Model\MasterSetup\Officer', 'id', 'officer_id');
    }

    public function collector()
    {
        return $this->hasOne('App\Model\MasterSetup\Officer', 'id', 'collector_id');
    }

    public function groups()
    {
        return $this->hasOne('App\Model\MasterSetup\Groups', 'id', 'groups_id');
    }

    // public function barangay()
    // {
    //     return $this->hasOne('App\Model\Loans\Barangay', 'id', 'barangay_id');
    // }

    public function lending()
    {
        return $this->hasOne('App\Model\Loans\Lending', 'id', 'lending_id');
    }

    public function office()
    {
        return $this->hasOne('App\Model\Loans\Office', 'id', 'office_id');
    }

    public function economic()
    {
        return $this->hasOne('App\Model\MasterSetup\Economic', 'id', 'economic_id');
    }

    public function subProject()
    {
        return $this->hasOne('App\Model\MasterSetup\SubProject', 'id', 'subproject_id');
    }
}
