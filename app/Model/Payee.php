<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payee extends Model
{
    
    protected $table = 'payees';
    protected $fillable = [
        'transaction_id',
        'payable_id',
        'payable_type'
    ];

    public function payable(){

        return $this->morphTo();
    }
}
