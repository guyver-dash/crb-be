<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormat;

class Logistic extends Model
{

    use DateTimeFormat;
    
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

    public function items()
    {
        return $this->morphToMany('App\Model\Item', 'vendorable')->withPivot('id','rank', 'dis_percentage');
    }


    public function scopeRelTable($query){
        return $query->with(['businessInfo', 'address.country', 'address.region','address.province', 'address.city', 'address.brgy', 'items']);
    }
}
