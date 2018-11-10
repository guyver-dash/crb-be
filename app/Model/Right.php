<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Right extends Model
{
    
    public function holdings()
    {
        return $this->morphedByMany('App\Model\Holding', 'rightable');
    }

    public function users(){

    	 return $this->morphedByMany('App\Model\User', 'rightable');
    }
}
