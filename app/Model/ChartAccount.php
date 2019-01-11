<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ChartAccount extends Model
{
    
    protected $table = 'chart_accounts';
    protected $fillable = [
        'company_id',
        'parent_id',
        'taccount_id',
        'name',
        'account_code',
        'account_display',
        'accounting_standard_id',
        'remarks'
    ];

    public static function boot() {
        parent::boot();

        static::deleting(function($chartAccount) {
            $chartAccount->children()->delete();
        });
    }

    public function parent(){
        return $this->hasOne('App\Model\ChartAccount', 'id', 'parent_id');
    }
    public function children() {

        return $this->hasMany('App\Model\ChartAccount', 'parent_id', 'id');
    }

    public function allChildren()
    {
        return $this->children()->with(['allChildren', 'tAccount']);
    } 

    public function company(){
        return $this->belongsTo('App\Model\Company');
    }

    public function tAccount(){
        return $this->hasOne('App\Model\TAccount', 'id', 'taccount_id');
    }

    public function scopeRelTable($query){

        return $query->with(['allChildren', 'parent', 'company', 'tAccount']);
    }

    
}
