<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Obfuscate\Optimuss;
class Role extends Model
{
    use Optimuss;

    protected $table = 'roles';
    protected $fillable = ['name', 'description', 'parent_id'];
    protected $appends = ['optimus_id'];
    public function users(){
    	 return $this->belongsToMany('App\Model\User');
    }
    public function accessRights(){
        return $this->belongsToMany('App\Model\AccessRight');
    }
    public function parents(){
        return $this->hasMany('App\Model\Role', 'id', 'parent_id');
    }
    public function children() {
        return $this->hasMany('App\Model\Role', 'parent_id', 'id');
    }
    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }
}
