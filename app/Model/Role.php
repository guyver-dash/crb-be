<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

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

    public function scopeSubordinates($query, User $user){

        $query->where('parent_id', '>=', $user->roles()->orderBy('parent_id', 'ASC')->first()->parent_id);
        $query->where('parent_id', '>=', $user->roles()->orderBy('parent_id', 'ASC')->first()->id);
            
        return $query;
    }

    public function scopeParent($q){

        $q->min('parent_id');
    }
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }

    public function scopeChildLess($q){

        $q->where('parent_id', '=', 0);

    }
}
