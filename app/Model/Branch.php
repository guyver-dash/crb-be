<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';

    protected $fillable = [
        'name', 'desc', 'company_id'
    ];

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function scopeRelTable($query){

        return $query->with(['address.region','address.province', 'address.city', 'address.brgy', 'company', 'businessInfo']);
    }

    public function accessRight(){

        return $this->belongsToMany('App\Model\AccessRight');
    }

    

    
}
