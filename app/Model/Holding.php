<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Holding extends Model
{
    
    protected $table = 'holdings';

    protected $fillable = ['name', 'desc'];

    public static function boot() {
        parent::boot();

        static::deleting(function($holding) {
            $holding->roles()->detach();
            $holding->address()->delete();
            $holding->companies()->delete();
        });
    }

    
    public function companies(){

        return $this->hasMany('App\Model\Company', 'holding_id', 'id');
    }
    public function users(){

        return $this->belongsToMany('App\Model\User', 'holding_user', 'user_id', 'holding_id');
    }

    public function roles(){

        return $this->belongsToMany('App\Model\Role', 'holding_role', 'role_id', 'holding_id');
    }


    public function images(){

        return $this->morphMany('App\Model\Image', 'imageable');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }


    public function scopeRelTable($query){

    	return $query->with(['address.country', 'address.region','address.province', 'address.city', 'address.brgy', 'companies', 'images', 'roles', 'businessInfo.businessType', 'businessInfo.vatType']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }

    
}
