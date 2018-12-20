<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    
    protected $table = 'purchases';
    protected $fillable = [
        'purchasable_type', 'purchasable_id', 'purchase_no',
        'purchase_status_id', 'purchase_status_id', 'prepared_by',
        'noted_date', 'noted_by', 'approved_date', 'approved_by', 'order_date',
        'shipped_date', 'freight', 'sub_total', 'vat_total', 'grand_total',
        'invoice_no', 'received_date', 'received_by', 'received_by'
    ];

    public function items(){
        return $this->belongsToMany('App\Model\Item', 'item_purchase', 'item_id', 'purchase_id')->withTimestamps();
    }

    public function purchasable(){

        return $this->morphTo();
    }

    public function preparedBy(){
        return $this->hasOne('App\Model\User', 'id', 'prepared_by');
    }

    public function scopeRelTable($q){
        return $q->with(['purchasable', 'items', 'preparedBy']);
    }
}
