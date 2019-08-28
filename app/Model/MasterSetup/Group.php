<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $table = 'groups';
    protected $fillable = [ "center_id", "name"];

    public function center()
    {
        return $this->belongsTo('App\Model\MasterSetup\Center');
    }

}
