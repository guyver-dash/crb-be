<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormat;
use App\Traits\Model\Globals;

class Logistic extends Model
{

    use Globals;
    
    protected $table = 'logistics';
    protected $fillable = [
    	'name', 'desc'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($logistic) {
            $logistic->address()->delete();
            $logistic->businessInfo()->delete();
        });
    }

    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function purchase(){

    	return $this->morphMany('App\Model\Address', 'purchasable');
    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }


    public function scopeRelTable($query){
        return $query->with(['businessInfo', 'address.country', 'address.region','address.province', 'address.city', 'address.brgy', 'items']);
    }
}
