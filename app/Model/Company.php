<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $table = 'companies';
    protected $fillable = [
    	'name', 'desc'
    ];
}
