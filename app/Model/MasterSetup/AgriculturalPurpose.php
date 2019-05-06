<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class AgriculturalPurpose extends Model
{
    protected $table = 'agricultural_purpose';
    protected $fillable = ['name'];
}
