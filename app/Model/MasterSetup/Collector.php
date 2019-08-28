<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Collector extends Model
{
    protected $table = 'collectors';
    protected $fillable = [ 'information_id', 'branch_id', 'imei'];

    public function information()
    {
        return $this->hasOne('App\Model\Information', 'id', 'information_id');
    }

    public function center()
    {
        return $this->hasMany('App\Model\MasterSetup\Center');
    }

    public function branch()
    {
        return $this->hasOne('App\Model\Branch', 'id', 'branch_id');
    }
}
