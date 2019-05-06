<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Collectors extends Model
{
    protected $table = 'collectors';
    protected $fillable = [ 'name','branch_id','pos_number','username','password','cp_number','imei','orig_code'];

    public function loanCenter (){
    	return $this->hasOne('App\Model\MasterSetup\LoanCenter', 'account_officer', 'id');
    }
}
