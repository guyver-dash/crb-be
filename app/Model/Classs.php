<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Classs extends Model
{
    
    protected $table = 'classes';

    public function classable(){

        return $this->morphTo();
   }

    public function children() {

        return $this->hasMany('App\Model\Classs', 'parent_id', 'id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    } 
}
