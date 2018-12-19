<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    protected $table = 'items';
    protected $fillable = [
      'itemable_id', 'itemable_type', 'sku', 'barcode', 'name', 'desc', 'price', 'qty', 'package_id', 'minimum', 'maximum', 'reorder_level'
    ];

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

    public function package(){

        return $this->hasOne('App\Model\Package', 'id', 'package_id');
    }


    public function vendorable($model){

        return $this->morphedByMany($model,'vendorable')
                    ->withPivot(['id','rank', 'dis_percentage', 'start_date', 'end_date', 'price', 'volume', 'remarks', 'created_by', 'approved_by']);

    }
    public function scopeRelTable($query){

        return $query->with(['package', 'logistics', 'otherVendors']);
    }
}
