<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class LoanCenter extends Model
{
    protected $table = 'loan_centers';
    protected $fillable = ['name','address','chief','treasurer','secretary','account_officer','barangay','savings_account','branch_id'];
}
