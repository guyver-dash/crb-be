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

    public function branch()
    {
        return $this->morphedByMany('App\Model\Branch', 'payable');
    }

    public function transactable(){

        return $this->morphTo();
    }

    public function chartAccount(){
        
        return $this->belongsTo('App\Model\ChartAccount');
    }

    public function transactionType(){

        return $this->belongsTo('App\Model\TransactionType');
    }

    public function createdBy(){

        return $this->hasOne('App\Model\User', 'id', 'created_by');
    }

    public function payee(){

        return $this->hasOne('App\Model\Payee', 'transaction_id', 'id');
    }

    public function generalLedgers(){

        return $this->hasMany('App\Model\GeneralLedger', 'transaction_id', 'id');
    }

    public function scopeRelTable($query){
        return $query->with(['chartAccount', 'transactionType', 'createdBy',  'generalLedgers']);
    }

    
}
