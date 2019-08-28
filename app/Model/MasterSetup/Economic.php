<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Economic extends Model
{
    protected $table = 'economics';
    protected $fillable = [ 'description', 'isAgricultural'];
}
