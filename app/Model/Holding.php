<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Holding extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $table = 'holdings';

    protected $fillable = ['name', 'desc'];

    public static function boot() {
        parent::boot();

        static::deleting(function($holding) {
            // $holding->companies()->delete();
            // $holding->address()->delete();
        });
    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }
    
    public function companies(){

        return $this->hasMany('App\Model\Company', 'holding_id', 'id');
    }
    public function users(){

        return $this->belongsToMany('App\Model\User', 'holding_user', 'user_id', 'holding_id');
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

    	return $query->with(['address.country', 'address.region','address.province', 'address.city', 'address.brgy', 'companies', 'images', 'businessInfo.businessType', 'businessInfo.vatType']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }

    
}
