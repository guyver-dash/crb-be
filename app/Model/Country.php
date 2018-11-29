<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    
    protected $table = 'countries';

    public function regions()
    {
        return $this->hasMany('App\Model\Region');
    }

}
