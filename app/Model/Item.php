<?php

namespace App\Model;

use App\Model\Tax;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'items';
    protected $fillable = [
        'itemable_id', 'itemable_type', 'sku', 'barcode', 'name', 'desc', 'price', 'qty', 'vat_type_id', 'package_id', 'minimum', 'maximum', 'reorder_level',
    ];

    protected $appends = ['pivot_date_approved', 'pivot_date_delivery', 'pivot_price', 'pivot_qty', 'total_amount', 'purchase_tax', 'pivot_tax_type', 'discount_amt'];

    public function chartAccount()
    {
        return $this->hasOne('App\Model\ChartAccount', 'id', 'chart_account_id');
    }
    public function itemable()
    {

        return $this->morphTo();
    }

    public function logistics()
    {
        return $this->vendorable('App\Model\Logistic');
    }

    public function branches()
    {
        return $this->vendorable('App\Model\Branch');
    }

    public function commissaries()
    {
        return $this->vendorable('App\Model\Commissary');
    }

    public function otherVendors()
    {
        return $this->vendorable('App\Model\OtherVendor');

    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    public function taxType()
    {

        return $this->hasOne('App\Model\TaxType', 'id', 'tax_type_id');
    }
    public function package()
    {

        return $this->hasOne('App\Model\Package', 'id', 'package_id');
    }

    public function vendorable($model)
    {

        return $this->morphedByMany($model, 'vendorable')
            ->withPivot(['id', 'rank', 'dis_percentage', 'start_date', 'end_date', 'price', 'volume', 'remarks', 'created_by', 'approved_by', 'freight']);

    }

    public function purchases()
    {
        return $this->belongsToMany('App\Model\Purchase', 'item_purchase', 'item_id', 'purchase_id')
            ->withPivot('id', 'qty', 'price', 'freight', 'approved_by', 'date_approved', 'date_delivery', 'token')
            ->withTimestamps();
    }

    public function scopeRelTable($query)
    {

        return $query->with(['package', 'logistics', 'otherVendors', 'branches', 'commissaries', 'purchases', 'chartAccount', 'taxType']);
    }

    public function getDiscountAmtAttribute(){
        return (float)$this->price * ($this->discount/100);
    }

    public function getPivotDateApprovedAttribute()
    {

        return Carbon::parse($this->pivot['date_approved'])->toDayDateTimeString();

    }

    public function getPriceAttribute($val)
    {

        return (float) $val;

    }

    public function getPivotPriceAttribute()
    {

        return (float) $this->pivot['price'];

    }

    public function getPivotQtyAttribute()
    {
        return (int) $this->pivot['qty'];
    }

    public function getPivotTaxTypeAttribute()
    {
        return $this->pivot['tax_type'];
    }

    public function getTotalAmountAttribute()
    {

        return (float) $this->pivot['price'] * (float) $this->pivot['qty'];

    }

    public function getPivotDateDeliveryAttribute()
    {

        return Carbon::parse($this->pivot['date_delivery'])->toDayDateTimeString();

    }

    public function getPurchaseTaxAttribute()
    {

        $tax = Tax::where('default', 1)->first()->percent;
        if ($this->tax_type_id === 1) {
            return (float) $this->getTotalAmountAttribute() * (float) $tax / 100;
        } else if ($this->tax_type_id === 2) {
            return 0;
        } else {
            return 0;
        }

    }

}
