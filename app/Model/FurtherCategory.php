<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class FurtherCategory extends Model
{
    
    protected $table = 'further_categories';
    protected $fillable = ['subcategory_id', 'name', 'desc'];

    public function subcategories(){

    	return $this->belongsTo('App\Model\SubCategory', 'subcategory_id', 'id');
    }

    public function scopeRelTable($query){
    	return $query->orderby('created_at', 'DESC')->with('subcategories.categories');
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }	
}
