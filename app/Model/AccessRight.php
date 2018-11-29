<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AccessRight extends Model
{
    
    protected $table = 'access_rights';

    protected $fillable = ['name'];
    

    public function roles(){
        return $this->belongsToMany('App\Model\Role', 'access_right_role', 'access_right_id', 'role_id');
    }

    public function menus(){
        return $this->belongsToMany('App\Model\Menu', 'access_right_menu', 'menu_id', 'access_right_id');
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
    
    public function scopeRelTable($query){
        return $query->with(['roles', 'menus']);
    }
}
