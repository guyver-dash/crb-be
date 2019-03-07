<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NormalBalance extends Model
{
    
    protected $table = 'normal_balance';
    protected $fillable = [
        'name'
    ];
}
