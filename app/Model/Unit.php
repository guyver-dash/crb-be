<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    
    protected $table = 'units';
    protected $fillable = ['user_id', 'type', 'name', 'description'];
}
