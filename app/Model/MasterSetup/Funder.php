<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Funder extends Model
{
    protected $table = 'funders';
    protected $fillable = [ 'branch_id', 'name', 'sub_name'];

    public function branch(){
        return $this->hasOne('App\Model\Branch', 'id', 'branch_id');
    }
}
