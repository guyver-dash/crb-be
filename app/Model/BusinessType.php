<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BusinessType extends Model
{
    
    protected $table = 'business_types';

    protected $fillable = ['name'];
}
