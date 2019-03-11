<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    
    protected $table = 'item_types';

    protected $fillable = [
        'name', 'desc'
    ];
}
