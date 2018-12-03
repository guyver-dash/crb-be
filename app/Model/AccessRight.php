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

    public function holdings(){
        return $this->belongsToMany('App\Model\Holding', 'access_right_holding', 'holding_id', 'access_right_id');
    }

    public function companies(){
        return $this->belongsToMany('App\Model\Company', 'access_right_company', 'company_id', 'access_right_id');
    }

    public function branches(){
        return $this->belongsToMany('App\Model\Branch', 'access_right_branch', 'branch_id', 'access_right_id');
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
    
    public function scopeRelTable($query){
        return $query->with(['roles', 'menus']);
    }
}
