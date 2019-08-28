<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class SubProject extends Model
{
    protected $table = 'sub_projects';
    protected $fillable = [ 'description', 'isOtherAgricultural'];
}
