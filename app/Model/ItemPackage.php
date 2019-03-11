<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemPackage extends Model
{
    
    protected $table = 'item_packages';
    protected $fillable = ['name', 'desc'];
}
