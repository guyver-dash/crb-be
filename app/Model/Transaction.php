<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Model\Globals;

class Transaction extends Model
{

    use Globals;
    
    protected $table = 'transactions';
    protected $fillable = [
        'transactable_id', 
        'transactable_type', 
        'transaction_type_id',
        'total_amount',
        'remarks',
        'status'
    ];

    public function transactable(){

        return $this->morphTo();
    }

    public function chartAccount(){
        
        return $this->belongsTo('App\Model\ChartAccount');
    }

    public function transactionType(){

        return $this->belongsTo('App\Model\TransactionType');
    }

    public function scopeRelTable($query){
        return $this->with(['chartAccounts', 'transactionType']);
    }

    
}
