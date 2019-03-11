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

    protected $appends = ['entity', 'complete_address'];

    public function jobs()
    {
        return $this->morphmany('App\Model\Job', 'jobable');
    }

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

    	return $this->morphMany('App\Model\PurchaseReceived', 'purchasable');
    }

    public function saleInvoices()
    {

    	return $this->morphMany('App\Model\SaleInvoice', 'salable');
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

        return $query->with(['purchaseReceived.items', 'address.region', 'address.province', 'address.city', 'address.brgy', 'company', 'businessInfo', 'items.taxType', 'transactions.chartAccount', 'transactions.transactionType', 'transactions.payee','purchases.items.chartAccount', 'purchases.items.taxType']);
    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    public function getEntityAttribute()
    {

        return 'App\Model\Branch';
    }

    public function getCompleteAddressAttribute(){
        return $this->address->street_lot_blk . ', '. $this->address->brgy->description . ', '. $this->address->city->description . ', '. $this->address->province->description;
    }

}
