<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\Items;

class Branch extends Model
{
    use Items;
    
    protected $table = 'branches';

    protected $fillable = [
        'name', 'desc', 'company_id'
    ];

    

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function franchisee(){

    	return $this->morphOne('App\Model\Franchisee', 'franchisable');
    }

    public function category(){

    	return $this->morphOne('App\Model\Category', 'categorable');
    }

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function scopeRelTable($query){

        return $query->with(['address.region','address.province', 'address.city', 'address.brgy', 'company', 'businessInfo', 'items']);
    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    
}
