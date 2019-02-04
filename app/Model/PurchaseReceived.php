<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseReceived extends Model
{

    protected $table = 'purchase_received';
    protected $fillable = [
        'purchase_received_id', 'qty', 'price', 'freight', 'tax', 'token', 'sub_total', 'grand_total',
    ];

    public function items()
    {
        return $this->belongsToMany('App\Model\Item', 'item_purchase_received', 'purchase_received_id', 'item_id')
            ->withPivot('id', 'qty', 'price', 'freight', 'sub_total')
            ->withTimestamps();
    }

    public function purchase()
    {

        return $this->hasOne('App\Model\Purchase', 'id', 'purchase_id');
    }

    public function purchasable()
    {

        return $this->morphTo();
    }

    public function getGrandTotalAttribute($val)
    {
        return (float) $val;
    }
}
