<?php

namespace App\Model;

use App\Traits\Model\Globals;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use Globals;

    protected $table = 'branches';

    protected $fillable = [
        'name', 'desc', 'company_id',
    ];

    protected $appends = ['entity'];

    public function transactions()
    {

        return $this->morphMany('App\Model\Transaction', 'transactable');
    }

    public function purchases()
    {

        return $this->morphMany('App\Model\Purchase', 'purchasable');
    }

    public function purchaseReceived()
    {

<<<<<<< HEAD
    	return $this->morphMany('App\Model\PurchaseReceived', 'purchasable');
=======
        return $this->morphMany('App\Model\PurchaseReceived', 'purchasable');
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c
    }

    public function items()
    {

        return $this->morphMany('App\Model\Item', 'itemable');
    }

    public function address()
    {

        return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function franchisee()
    {

        return $this->morphOne('App\Model\Franchisee', 'franchisable');
    }

    public function category()
    {

        return $this->morphOne('App\Model\Category', 'categorable');
    }

    public function company()
    {
        return $this->belongsTo('App\Model\Company');
    }

    public function businessInfo()
    {

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function scopeRelTable($query)
    {

        return $query->with(['purchaseReceived.items', 'address.region', 'address.province', 'address.city', 'address.brgy', 'company', 'businessInfo', 'items.taxType', 'transactions.chartAccount', 'transactions.transactionType', 'purchases.items.chartAccount', 'purchases.items.taxType']);
    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    public function getEntityAttribute()
    {

        return 'App\Model\Branch';
    }

}
