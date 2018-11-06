<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemInfo extends Model
{
    
    protected $table = "item_info";

    protected $fillable = [

        'item_id', 'user_id', 'store_id', 'branch_id', 'unit_id', 'category_id', 'subcategory_id', 'further_category_id', 'provCode', 'citymunCode', 'brgyCode'
    ];
    public function item(){

    	return $this->hasOne('App\Model\Item', 'id', 'item_id');
    }

    public function store(){

        return $this->hasOne('App\Model\Store', 'id', 'store_id');
    }

    public function branch(){

        return $this->hasOne('App\Model\Branch', 'id', 'branch_id');
    }


    public function province(){

        return $this->hasOne('App\Model\Province', 'id', 'provCode');

    }

    public function city(){

        return $this->hasOne('App\Model\City', 'id', 'citymunCode');
    }

    public function brgy(){
         return $this->hasOne('App\Model\Brgy', 'id', 'brgyCode');
    }

    public function images(){

    	return $this->morphMany('App\Model\Image', 'imageable', 'imageable_type', 'imageable_id');
    }

    public function colors(){
        return $this->belongsToMany('App\Model\Color', 'color_item', 'item_info_id', 'color_id');
    }

    public function category(){
       return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }

    public function subCategory(){
       return $this->hasOne('App\Model\SubCategory', 'id', 'subcategory_id');
    }

    public function furtherCategory(){
       return $this->hasOne('App\Model\FurtherCategory', 'id', 'further_category_id');
    }

    public function scopeRelTable($query){
        return $query->with(['category', 'subCategory', 'furtherCategory', 'colors.images', 'brgy', 'city', 'province', 'store', 'branch', 'item.images']);
    }
}
