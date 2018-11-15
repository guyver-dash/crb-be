<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccessRight extends Model
{
    
    protected $table = 'access_rights';
    

     public function roles(){
        return $this->belongsToMany('App\Model\Role', 'access_right_role', 'access_right_id', 'role_id');
    }
}
