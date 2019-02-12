<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Tax;

class PurchaseReceived extends Model
{
    protected $table = 'purchase_received';
    protected $fillable = [
        'purchase_recieved_id', 'qty', 'price', 'freight', 'tax', 'token', 'sub_total', 'grand_total', 'date_due'
    ];
    protected $appends = ['vatable_sales', 'vat_exempt_sales', 'zero_rated_sales', 'vat_amount', 'amount_due', 'pivot_amount_due', 'pivot_amount_paid', 'pivot_discount', 'pivot_vat_amount', 'pivot_vat_exempt_sales', 'pivot_vatable_sales', 'pivot_zero_rated_sales', 'pivot_pay'];
    public function items(){
        return $this->belongsToMany('App\Model\Item', 'item_purchase_received', 'purchase_received_id', 'item_id')
                    ->withPivot('id', 'qty', 'price', 'freight', 'sub_total')
                    ->withTimestamps();
    }

    public function purchase(){

        return $this->hasOne('App\Model\Purchase', 'id', 'purchase_id');
    }

    public function purchasable(){

        return $this->morphTo();
    }

    public function getDiscountAttribute($val){
        return (float)$val;
    }
    public function getGrandTotalAttribute($val){
        return (float)$val;
    }

    public function getvatableSalesAttribute(){
       
       return (float) $this->items->filter(function($i){
            return $i->tax_type_id === 1;
        })->map(function($item){
            return $item->pivot->price * $item->pivot->qty;
        })->first();

    }

    public function getvatExemptSalesAttribute(){
       return (float) $this->items->filter(function($i){
            return $i->tax_type_id === 2;
        })->map(function($item){
            return $item->pivot->price * $item->pivot->qty;
        })->first();
    }
    public function getzeroRatedSalesAttribute(){
        return (float)$this->items->filter(function($i){
            return $i->tax_type_id === 3;
        })->map(function($item){
            return $item->pivot->price * $item->pivot->qty;
        })->first();
    }

    public function getAmountDueAttribute(){
        return $this->grand_total;
    }

    public function getvatAmountAttribute(){
        return (float) number_format( $this->getvatableSalesAttribute() * (Tax::where('default', 1)->first()->percent/100), 2, '.', '') ;
    }

    public function getPivotAmountDueAttribute(){

        return (float)$this->pivot['amount_due'];
    }

    public function getPivotAmountPaidAttribute(){

        return (float)$this->pivot['amount_paid'];
    }

    public function getPivotDiscountAttribute(){

        return (float)$this->pivot['discount'];
    }

    public function getPivotVatAmountAttribute(){

        return (float)$this->pivot['vat_amount'];
    }

    public function getPivotVatExemptSalesAttribute(){

        return (float)$this->pivot['vat_exempt_sales'];
    }

    public function getPivotVatableSalesAttribute(){
        
        return (float)$this->pivot['vatable_sales'];
    }

    public function getPivotZeroRatedSalesAttribute(){

        return (float)$this->pivot['zero_rated_sales'];
    }

    public function getPivotPayAttribute(){

        return (boolean)$this->pivot['pay'];
    }

    
}
