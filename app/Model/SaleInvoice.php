<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\Tax;

class SaleInvoice extends Model
{
    protected $table = 'sale_invoices';
    protected $fillable = [
        'purchase_id', 'purchasable_id', 'purchasable_type',
        'ref_number', 'ticket_id', 'ship_date', 'freight',' grand_total', 'created_by_id',
        'discount', 'vat_amount', 'vat_exempt_sales', 'vatable_sales', 'zero_rate_sales'
    ];

    protected $appends = ['vatable_sales', 'vat_exempt_sales', 'zero_rated_sales', 'vat_amount', 'pivot_amount_due', 'pivot_amount_paid', 'pivot_discount', 'pivot_vat_amount', 'pivot_vat_exempt_sales', 'pivot_vatable_sales', 'pivot_zero_rated_sales', 'pivot_pay', 'pivot_job_id'];

    public function salable(){

        return $this->morphTo();
    }

    public function products(){
        return $this->belongsToMany('App\Model\Product', 'product_sale_invoice', 'sale_invoice_id', 'product_id')
                    ->withPivot('id', 'qty', 'price', 'freight', 'sub_total')
                    ->withTimestamps();
    }

    public function getvatableSalesAttribute(){
       
        return (float) $this->products->filter(function($i){
             return $i->tax_type_id === 1;
         })->map(function($item){
             return $item->pivot->price * $item->pivot->qty;
         })->first();
 
     }
 
     public function getvatExemptSalesAttribute(){
        return (float) $this->products->filter(function($i){
             return $i->tax_type_id === 2;
         })->map(function($item){
             return $item->pivot->price * $item->pivot->qty;
         })->first();
     }
     public function getzeroRatedSalesAttribute(){
         return (float)$this->products->filter(function($i){
             return $i->tax_type_id === 3;
         })->map(function($item){
             return $item->pivot->price * $item->pivot->qty;
         })->first();
     }

     public function getDiscountAttribute($val){
         return (float)$val;
     }

     public function getFreightAttribute($val){
        return (float)$val;
    }

    public function getGrandTotalAttribute($val){
        return (float)$val;
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

    public function getPivotJobIdAttribute(){

        return $this->pivot['job_id'];
    }

}
