<?php 

namespace App\Traits;
use Carbon\Carbon;

trait DateTimeFormat
{
    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}