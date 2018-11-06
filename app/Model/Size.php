<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    
    protected $table = 'sizes';
    protected $fillable = ['user_id', 'name', 'desc'];
}
