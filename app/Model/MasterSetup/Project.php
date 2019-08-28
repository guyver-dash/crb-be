<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $fillable = [ 'description', 'isAgricultural', 'isMicro'];
}
