<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Obfuscate\Optimuss;

class Menu extends Model
{
    use Optimuss;
    protected $table = 'menus';
    protected $fillable = ['name'];
    protected $appends = ['slug_name', 'optimus_id'];
    public function children() {
        return $this->hasMany('App\Model\Menu', 'parent_id', 'id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    } 

    public function getSlugNameAttribute(){
        return str_slug($this->name);
    }
}
