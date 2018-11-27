<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Role extends Model
{
    
    protected $table = 'roles';
    protected $fillable = ['name', 'desc'];


    public function users(){

    	 return $this->belongsToMany('App\Model\User');
    }

    public function accessRights(){

        return $this->belongsToMany('App\Model\AccessRight');
    }

    public function children() {

        return $this->hasMany('App\Model\Role', 'parent_id', 'id');
    }

    public function scopeRelTable($query){

        return $query->with(['children']);
    }

    public function scopeSubordinates($query, User $user){

        $query->where('parent_id', '>=', $user->roles()->orderBy('parent_id', 'ASC')->first()->parent_id);
        $query->where('parent_id', '>=', $user->roles()->orderBy('parent_id', 'ASC')->first()->id);
            
        return $query;
    }

    public function scopeAvailRoles($query, $parentId, $roleId){

        $query->where('parent_id', '>=', $parentId);
        $query->where('parent_id', '>=', $roleId);
            
        return $query;
    }

    // public function scopeParent($q){

    //     $q->min('parent_id');
    // }
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function scopeChildLess($q){

        $q->where('parent_id', '=', 0);

    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}
