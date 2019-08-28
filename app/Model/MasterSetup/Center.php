<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $table = 'centers';
    protected $fillable = [ "collector_id", "name", "address" ];

    public function collector()
    {
        return $this->belongsTo('App\Model\MasterSetup\Collector');
    }

    public function groups()
    {
        return $this->hasMany('App\Model\MasterSetup\Group');
    }
}
