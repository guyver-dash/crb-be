<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\Globals;

class Branch extends Model
{
    use Globals;
    
    protected $table = 'branches';

    protected $fillable = [
        'name', 'desc', 'company_id'
    ];

    protected $appends = ['entity'];
    
    public function transactions(){

    	return $this->morphMany('App\Model\Transaction', 'transactable');
    }


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

        return $query->with(['address.region','address.province', 'address.city', 'address.brgy', 'company', 'businessInfo', 'items', 'transactions.chartAccount', 'transactions.transactionType']);
    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }


    public function getEntityAttribute(){

        return 'App\Model\Branch';
    }
    
}
