<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $fillable = [

        'country_id',
        'region_id',
    	'province_id',
    	'city_id',
    	'brgy_id',
    	'street_lot_blk',
    	'longitude',
    	'latitude'
    ];

    public function addressable(){

    	 return $this->morphTo();
    }

    public function country(){

        return $this->hasOne('App\Model\Country', 'id', 'country_id');
    }

    public function region(){

        return $this->hasOne('App\Model\Region', 'id', 'region_id');
    }

    public function province(){

        return $this->hasOne('App\Model\Province', 'id', 'province_id');
    }

    public function city(){

        return $this->hasOne('App\Model\City', 'id', 'city_id');
    }

    public function brgy(){

        return $this->hasOne('App\Model\Brgy', 'id', 'brgy_id');
    }

}
