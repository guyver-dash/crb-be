<?php 

namespace App\Traits\Model;
use Carbon\Carbon;

trait Globals
{
    public function items()
    {
        return $this->morphMany('App\Model\Item', 'itemable');
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}