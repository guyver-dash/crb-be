<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VatType extends Model
{
    
    protected $table = 'vat_types';

    protected $fillable = ['name'];
}
