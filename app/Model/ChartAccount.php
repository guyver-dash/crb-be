<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    
    protected $table = 'chart_accounts';
    protected $fillable = [
        'name', 'company_id', 'chart_category_id'
    ];
}
