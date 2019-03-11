<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    
    protected $table = 'provinces';

    public function region()
    {
        return $this->belongsTo('App\Model\Region');
    }

    public function cities()
    {
        return $this->hasMany('App\Model\City');
    }
}
