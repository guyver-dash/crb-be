<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Holding extends Model
{
    
    protected $table = 'holdings';

    public function branches(){

    	return $this->hasMany('App\Model\Branch', 'holding_id', 'id');
    }

    public function images(){

        return $this->morphMany('App\Model\Image', 'imageable');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function scopeRelTable($query){

    	return $query->with(['address.country', 'address.region','address.province', 'address.city', 'address.brgy', 'branches', 'images']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }

    
}
