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
            'chart_account_id',
            'trans_code'
    ];

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function chartAccount(){

        return $this->hasOne('App\Model\ChartAccount', 'id', 'chart_account_id');
    }

    public function scopeRelTable($query){

        return $query->with(['company', 'chartAccount']);
    }
}
