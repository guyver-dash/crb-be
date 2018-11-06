<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    
    protected $table = 'colors';
    protected $fillable = ['user_id', 'name', 'desc'];

    public function images(){

    	return $this->morphMany('App\Model\Image', 'imageable', 'imageable_type', 'imageable_id');
    }

    public function scopeRelTable($query){

    	return $query->with(['images'])->get();
    	
    }
}
