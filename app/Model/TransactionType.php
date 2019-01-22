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

    public function transaction(){
        return $this->hasOne('App\Model\Transaction', 'id', 'transaction_type_id');
    }

    public function tAccount(){
        return $this->hasOne('App\Model\TAccount', 'id', 'taccount_id');
    }

    public function scopeRelTable($query){

        return $query->with(['company', 'tAccount', 'transaction']);
    }
}
