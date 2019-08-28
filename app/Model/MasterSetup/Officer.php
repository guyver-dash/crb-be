<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Officer extends Model
{
    protected $table = 'officers';
    protected $fillable = [ 'designation_id', 'branch_id', 'name', 'isSignatory'];

    public function designation(){
    	return $this->hasOne('App\Model\MasterSetup\Designation', 'id', 'designation_id');
    }
}
