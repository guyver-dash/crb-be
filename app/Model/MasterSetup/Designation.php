<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'designations';
    protected $fillable = [ 'description' ];
}
