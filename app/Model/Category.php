<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{

    public static function boot() {
        parent::boot();

        static::deleting(function($category) {
            $category->children()->delete();
        });
    }

    
    protected $table = 'categories';
    protected $fillable = ['category_id', 'category_type', 'name', 'desc', 'parent_id'];

    public function categorable(){

        return $this->morphTo();
   }
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

    public function scopeRelTable($query){

        return $query->with(['allChildren', 'parent']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}
