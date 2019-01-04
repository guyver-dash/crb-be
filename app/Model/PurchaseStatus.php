<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PurchaseStatus extends Model
{
    
    protected $table = 'purchase_status';
    protected $fillable = ['name'];
}
