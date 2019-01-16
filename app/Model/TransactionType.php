<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\Globals;

class TransactionType extends Model
{
    
    use Globals;
    protected $table = 'transaction_types';
    protected $fillable = [
            'name',
            'desc',
            'company_id',
            'trans_code'
    ];

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function scopeRelTable($query){

        return $query->with(['company']);
    }
}
