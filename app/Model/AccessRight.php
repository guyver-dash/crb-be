<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\Model\Globals;

class AccessRight extends Model
{

    use Globals;
    
    protected $table = 'access_rights';

    protected $fillable = ['name'];
    

    public function trademarks()
    {
        return $this->morphedByMany('App\Model\Trademark', 'accessable');
    }

    public function branches()
    {
        return $this->morphedByMany('App\Model\Branch', 'accessable');
    }

    public function menus()
    {
        return $this->morphedByMany('App\Model\Menu', 'accessable');
    }

    public function holdings()
    {
        return $this->morphedByMany('App\Model\Holding', 'accessable');
    }

    public function companies()
    {
        return $this->morphedByMany('App\Model\Company', 'accessable');
    }

    public function franchisees()
    {
        return $this->morphedByMany('App\Model\Franchisee', 'accessable');
    }

    public function logistics()
    {
        return $this->morphedByMany('App\Model\Logistic', 'accessable');
    }

    public function commissaries()
    {
        return $this->morphedByMany('App\Model\Commissary', 'accessable');
    }

    public function otherVendors()
    {
        return $this->morphedByMany('App\Model\OtherVendor', 'accessable');
    }

    public function items()
    {
        return $this->morphedByMany('App\Model\Item', 'accessable');
    }

    public function ingredients()
    {
        return $this->morphedByMany('App\Model\Ingredient', 'accessable');
    }


    public function roles(){
        return $this->belongsToMany('App\Model\Role', 'access_right_role', 'access_right_id', 'role_id');
    }
    
    public function scopeRelTable($query){
        return $query->with(['roles', 'menus']);
    }

    public function getNameAttribute($val){
        return ucwords($val);
    }
}
