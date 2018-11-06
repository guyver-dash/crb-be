<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    
    protected $table = 'menus';
    protected $fillable = ['name', 'to'];

    
	
	public function subMenus(){

		return $this->hasMany('App\Model\SubMenu');
	}    
}
