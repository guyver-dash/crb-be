<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Obfuscate\Optimuss;

class Category extends Model
{
    
    use Optimuss;
    
    protected $table = 'categories';
    protected $fillable = [
        'parent_id',
        'name'
    ];
    protected $appends = ['slug_name', 'optimus_id'];
    public function parent(){
        return $this->hasOne('App\Model\Category', 'id', 'parent_id');
    }
	public function children() {

        return $this->hasMany('App\Model\Category', 'parent_id', 'id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    } 

    public function getSlugNameAttribute(){
        return str_slug($this->name);
    }

    public function products(){
        return $this->hasMany('App\Model\Product', 'category_id', 'id');
    }

    public function scopeRelTable($q){
        return $q->with(['products.images']);
    }

    
}
