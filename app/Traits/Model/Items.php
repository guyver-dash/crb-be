<?php 

namespace App\Traits\Model;

trait Items
{
    public function items()
    {
        return $this->morphToMany('App\Model\Item', 'vendorable')->withPivot(['id','rank', 'dis_percentage', 'start_date', 'end_date', 'price', 'volume', 'remarks', 'created_by', 'approved_by', 'freight']);
    }
}