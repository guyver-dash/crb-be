<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Obfuscate\Optimuss;

use Auth;

class Menu extends Model
{

    use Optimuss;
    
    protected $table = 'menus';
    protected $fillable = ['name', 'description', 'parent_id'];
    protected $appends = ['optimus_id', 'slug_name'];
    
	public function parent(){
        return $this->hasOne('App\Model\Menu', 'id', 'parent_id');
    }
	public function children() {

        return $this->hasMany('App\Model\Menu', 'parent_id', 'id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    } 
    
    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    public function scopeUserMenus($query){
       return $query->whereHas('accessRight.roles.users', function($query){
            $query->where('users.id', Auth::User()->id);
        });
    }

    public function scopeRelTable($query){
       return $query->with(['accessRights.roles.users', 'allChildren', 'parent']);
    }

    public function scopeSuperiors($query, $parentId){
        return $query->where('parent_id', '<', $parentId);
    }

    public function getSlugNameAttribute(){
        return str_slug($this->name, '-');
    }

    
}
