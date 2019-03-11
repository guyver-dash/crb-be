<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TaxType extends Model
{
    
    protected $table = 'tax_types';
    protected $fillable = ['name', 'desc'];
}
