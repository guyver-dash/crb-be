<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payor extends Model
{
    protected $table =  'payors';
    protected $fillable = ['transaction_id', 'payable_id', 'payable_type'];
}
