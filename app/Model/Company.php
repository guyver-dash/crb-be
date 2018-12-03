<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Company extends Model
{
    
    protected $table = 'companies';
    protected $fillable = [
    	'name', 'desc'
    ];

    public function branches(){

        return $this->hasMany('App\Model\Branch', 'id', 'branch_id');
    }

    public function holding(){

        return $this->belongsTo('App\Model\Holding');
    }

    public function accessRights(){

        return $this->belongsToMany('App\Model\AccessRight');
   }
   
    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function scopeRelTable($q){

        return $q->with(['businessInfo', 'branches', 'holding', 'address.country', 'address.region','address.province', 'address.city', 'address.brgy']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }

    
}
