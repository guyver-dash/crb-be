<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    
    protected $table = 'permissions';

    protected $fillable = [

    	'permissable_id',
    	'permissable_type',
    	'user_id',
    	'role_id',
    	'acess_right_id',
    	'is_active'

    ];
    
}
