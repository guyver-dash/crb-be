<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountingStandard extends Model
{
    
    protected $table = 'accounting_standards';
    protected $fillable = [
        'name', 'mask'
    ];
}
