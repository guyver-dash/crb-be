<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Obfuscate\Optimuss;

class Product extends Model
{

    use Optimuss;
    protected $table = 'products';
    protected $fillable = [
        'chart_account_id', 'tax_type_id', 'sku', 'barcode', 'name',
        'desc', 'price', 'discount', 'qty'
    ];

    protected $appends = ['discounted_price', 'slug_name', 'category_slug_name', 'optimus_id'];

    public function images(){
    	return $this->morphMany('App\Model\Image', 'imageable', 'imageable_type', 'imageable_id');
    }

    public function category(){
        return $this->hasOne('App\Model\Category', 'id', 'category_id');
    }

    public function getPriceAttribute($val){
        return (float)$val;
    }

    public function getDiscountedPriceAttribute(){

        return (float)$this->price - ($this->price * ($this->discount / 100));
    }

    public function getSlugNameAttribute(){
        return str_slug($this->name);
    }

    public function scopeRelTable($q){
        return $q->with(['images', 'category']);
    }

    public function getCategorySlugNameAttribute(){
        return $this->category->slug_name;
    }

   
}
