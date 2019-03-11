<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\Globals;
class AccountingStandard extends Model
{
    
    use Globals;
    
    protected $table = 'accounting_standards';
    protected $fillable = [
        'name', 'mask'
    ];

}
