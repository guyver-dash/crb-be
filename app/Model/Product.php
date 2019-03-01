<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    
    protected $table = 'products';
    protected $fillable = [
        'chart_account_id',
        'tax_type_id',
        'productable_id',
        'productable_type',
        'sku',
        'barcode',
        'name',
        'desc',
        'price',
        'qty',
        'discount',
        'package_id'
    ];
    protected $appends = ['discount_amt'];
    public function getPriceAttribute($val){
        return (float)$val;
    }

    public function getDiscountAmtAttribute(){
        return (float)($this->discount/100) * $this->price;
    }
}
