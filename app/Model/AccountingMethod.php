<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccountingMethod extends Model
{
    
    protected $table = 'accounting_methods';
    protected $fillable = ['name'];


    public function transactionTypes(){
        return $this->belongsToMany('App\Model\TransactionType', 'accounting_method_transaction_type', 'accounting_method_id', 'transaction_type_id');
    }
}
