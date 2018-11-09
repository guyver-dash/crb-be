<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';


    public function store(){

    	return $this->hasOne('App\Model\Holding', 'id', 'holding_id');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    
}
