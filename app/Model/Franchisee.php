<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormat;

class Franchisee extends Model
{
    use DateTimeFormat;
    
    protected $table = 'franchisees';
    protected $fillable = [
        'name', 'desc', 'franchiseable_id', 'franchiseable_type', 'trade_id'
    ];

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function trademarks(){
        return $this->hasOne('App\Model\Trademark', 'id', 'trademark_id');
    }

    public function scopeRelTable($query){

        return $query->with(['address.region','address.province', 'address.city', 'address.brgy',  'businessInfo', 'trademarks.company', 'accessRights.roles.users']);
    }
}
