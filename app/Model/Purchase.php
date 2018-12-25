<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Traits\DateTimeFormat;

class Purchase extends Model
{
    
    use DateTimeFormat;
    protected $table = 'purchases';
    protected $fillable = [
        'name',
        'purchasable_type', 'purchasable_id', 'purchase_no',
        'purchase_status_id', 'purchase_status_id', 'prepared_by',
        'noted_date', 'noted_by', 'approved_date', 'approved_by', 'order_date',
        'shipped_date', 'freight', 'sub_total', 'vat_total', 'grand_total',
        'invoice_no', 'received_date', 'received_by', 'received_by'
    ];

    public function items(){
        return $this->belongsToMany('App\Model\Item', 'item_purchase', 'purchase_id', 'item_id')
                    ->withPivot('id', 'qty', 'price', 'freight', 'approved_by', 'date_approved', 'date_delivery', 'token')
                    ->withTimestamps();
    }

    public function purchasable(){

        return $this->morphTo();
    }

    public function preparedBy(){
        return $this->hasOne('App\Model\User', 'id', 'prepared_by');
    }

    public function notedBy(){
        return $this->hasOne('App\Model\User', 'id', 'noted_by');
    }

    public function approvedBy(){
        return $this->hasOne('App\Model\User', 'id', 'approved_by');
    }

    public function scopeRelTable($q){
        return $q->with(['purchasable', 'items', 'preparedBy', 'notedBy', 'approvedBy']);
    }

    public function getOrderDateAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }

    public function getNotedDateAttribute($val){

        if($val != null){
            return Carbon::parse($val)->toDayDateTimeString();
        }
       
    }

    public function getApprovedDateAttribute($val){

        if($val != null){
            return Carbon::parse($val)->toDayDateTimeString();
        }
        
    }

}
