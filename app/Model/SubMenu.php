<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SubMenu extends Model
{
    
    protected $table = 'sub_menus';


    public function subMenusChild(){

    	return $this->hasMany('App\Model\SubMenuChild', 'sub_menu_id', 'id');
    }
}
