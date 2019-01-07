<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChartCategory extends Model
{
    
    protected $table = 'chart_categories';

    protected $fillable = [
        'categorable_id',
        'categorable_type',
        'parent_id',
        'name',
        'account_code'
    ];
}
