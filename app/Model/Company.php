<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\DateTimeFormat;

class Company extends Model
{
    
    use DateTimeFormat;
    
    protected $table = 'companies';
    protected $fillable = [
    	'name', 'desc'
    ];

    public function vendors(){

        return $this->hasMany('App\Model\Vendor', 'id', 'company_id');
    }

    public function branches(){

        return $this->hasMany('App\Model\Branch', 'id', 'company_id');
    }

    public function trademarks(){

        return $this->hasMany('App\Model\Trademark', 'id', 'company_id');
    }

    public function holding(){

        return $this->belongsTo('App\Model\Holding');
    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
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

    
}
