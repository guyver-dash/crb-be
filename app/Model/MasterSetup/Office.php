<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    protected $table = 'offices';
    protected $fillable = [ 'branch_id', 'name', 'address'];

    public function branch(){
        return $this->hasOne('App\Model\Branch', 'id', 'branch_id');
    }
}
