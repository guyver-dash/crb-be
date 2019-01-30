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
    ];
    public function accountingMethod(){
        return $this->belongsToMany('App\Model\AccountingMethod', 'accounting_method_transaction_type', 'transaction_type_id', 'accounting_method_id');
    }

    public function transaction(){
        return $this->hasOne('App\Model\Transaction', 'id', 'transaction_type_id');
    }

    public function tAccount(){
        return $this->hasOne('App\Model\TAccount', 'id', 'taccount_id');
    }

    public function scopeRelTable($query){

        return $query->with(['tAccount', 'transaction']);
    }
}
