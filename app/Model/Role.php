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

    public function children() {

        return $this->hasMany('App\Model\Role', 'parent_id', 'id');
    }

    public function allChildrenRoles()
    {
        return $this->children()->with('allChildrenRoles');
    }

    public function scopeChildLess($q){

        $q->where('parent_id', '=', 0);

    }
}
