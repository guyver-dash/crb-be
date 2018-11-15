<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    
    protected $table = 'roles';
    protected $fillable = ['name', 'desc'];


    public function holdings(){

    	 return $this->belongsToMany('App\Model\Holding');
    }
}
