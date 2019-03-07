<?php 

namespace App\Traits\Model;
use Carbon\Carbon;

trait Globals
{

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}