<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Obfuscate\Optimuss;
use Carbon\Carbon;

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

    public function scopeRelTable($query){

        return $query->with(['children', 'parents']);
    }

    public function scopeSuperiors($query, $parentId){
        return $query->where('parent_id', '<', $parentId);
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

    public function scopeChildLess($q){

        $q->where('parent_id', '=', 0);

    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}
