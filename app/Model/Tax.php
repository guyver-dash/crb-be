<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    
    protected $table = 'taxes';
    protected $fillable = ['percent', 'default'];
}
