<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Trademark extends Model
{
    
    protected $table = 'trademarks';
    protected $fillable = ['company_id', 'name', 'desc'];

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function franchisees(){
        return $this->hasMany('App\Model\Franchisee', 'trademark_id', 'id');
    }

    public function scopeRelTable($query){

        return $query->with(['company']);
    }

    public function getCreatedAtAttribute($val){

        return Carbon::parse($val)->toDayDateTimeString();
    }
}
