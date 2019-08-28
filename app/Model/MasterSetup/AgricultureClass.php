<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class AgricultureClass extends Model
{
    protected $table = 'agriculture_class';
    protected $fillable = ['name'];
}
