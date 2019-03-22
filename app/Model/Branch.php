<?php

namespace App\Model;

use App\Traits\Model\Globals;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Obfuscate\Optimuss;

class Branch extends Model
{
    use Globals, Optimuss;

    protected $table = 'branches';
    protected $fillable = [
        'name', 'company_id', 'code', 'branch_address', 'initial', 'tel', 'bir'
    ];

    protected $appends = ['entity', 'optimus_id'];

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

    public function getCodeAttribute($val){
        return str_pad($val, 3, '0', STR_PAD_LEFT);
    }

    // public function getCompleteAddressAttribute(){
    //     return $this->address->street_lot_blk . ', '. $this->address->brgy->description . ', '. $this->address->city->description . ', '. $this->address->province->description;
    // }

}
