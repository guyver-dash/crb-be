<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Category extends Model
{
    
    protected $table = 'categories';
    protected $fillable = ['name', 'desc', 'parent_id'];

    public function categorable(){

        return $this->morphTo();
   }

    public function children() {

        return $this->hasMany('App\Model\Category', 'parent_id', 'id');
    }

    public function allChildren()
    {
        return $this->children()->with('allChildren');
    } 

    public function scopeRelTable($query){

        return $query->with(['allChildren']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}
