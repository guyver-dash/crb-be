<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    
    protected $table = 'regions';
    
    public function country()
    {
        return $this->belongsTo('App\Model\Country');
    }

    public function provinces()
    {
        return $this->hasMany('App\Model\Province');
    }
}
