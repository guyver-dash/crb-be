<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Brgy extends Model
{
    
    protected $table = 'barangays';

    public function region()
    {
        return $this->belongsTo('App\Model\Region');
    }

    public function province()
    {
        return $this->belongsTo('App\Model\Province');
    }

    public function city()
    {
        return $this->belongsTo('App\Model\City');
    }

    public function country()
    {
        return $this->belongsTo('App\Model\Country');
    }
}
