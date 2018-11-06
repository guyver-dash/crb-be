<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function branches(){

    	return $this->belongsTo('App\Model\Branch', 'id', 'store_id');
    }

    public function scopeRelTable($query){

    	return $query->with(['branches', 'images', 'address.province', 'address.city', 'address.brgy'])->get();
    }

    public function images(){

        return $this->morphMany('App\Model\Image', 'imageable', 'imageable_type', 'imageable_id');
    }
}
