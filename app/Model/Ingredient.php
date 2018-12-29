<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormat;

class Ingredient extends Model
{
    use DateTimeFormat;
    protected $table = 'ingredients';

    public function items(){
        return $this->belongsToMany('App\Model\Item', 'ingredient_item', 'ingredient_id', 'item_id')
                    ->withPivot('qty')
                    ->withTimestamps();
    }

    public function company(){
        return $this->hasOne('App\Model\Company', 'id', 'company_id');
    }

    public function scopeRelTable($q){
        return $q->with(['items', 'company']);
    }


}
