<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    protected $table = 'menus';
    protected $fillable = ['name', 'to'];

    
	
	public function children() {

        return $this->hasMany('App\Model\Menu', 'parent_id', 'id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    }   
}
