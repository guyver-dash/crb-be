<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    
    protected $table = 'vendors';
    protected $fillable = [
        'company_id', 'branch_id', 'vendor_id', 'discount', 'capable_supply'
    ];

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function branch(){
        return $this->belongsTo('App\Model\Branch', 'branch_id', 'id');
    }

    public function vendor(){
        return $this->belongsTo('App\Model\Branch', 'vendor_id', 'id');
    }

    public function scopeRelTable($query){
        return $query->with(['company', 'branch', 'vendor']);
    }
}
