<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    protected $table = 'product_transaction';
    protected $fillable = [
        'transaction_id',
        'product_id', 'desc', 'discount_amt',
        'qty', 'price', 'amount', 'chart_account_id',
        'tax_type_id', 'job_id'

    ];

    public function getDiscountAmtAttribute($val){
        return (float)$val;
    }

    public function getPriceAttribute($val){
        return (float)$val;
    }

    public function getAmountAttribute($val){
        return (float)$val;
    }
}
