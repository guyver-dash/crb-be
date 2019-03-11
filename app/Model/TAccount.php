<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TAccount extends Model
{
    
    protected $table = 'taccounts';
    protected $fillable = ['name'];
}
