<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class SubCategory extends Model
{
    
    protected $table = 'sub_categories';
    protected $fillable = ['category_id', 'name', 'desc'];

    public function furtherCategories(){

    	return $this->hasMany('App\Model\FurtherCategory', 'subcategory_id', 'id');
    }

    public function categories(){
    	 return $this->belongsTo('App\Model\Category', 'category_id', 'id');
    }

    public function scopeRelTable($query){
    	return $query->orderBy('created_at', 'DESC')->with(['categories']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}
