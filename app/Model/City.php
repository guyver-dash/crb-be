<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    
    protected $table = 'cities';

    public function region()
    {
        return $this->belongsTo('App\Model\Region');
    }

    public function province()
    {
        return $this->belongsTo('App\Model\Province');
    }

    public function barangays()
    {
        return $this->hasMany('App\Model\Brgy');
    }
}
