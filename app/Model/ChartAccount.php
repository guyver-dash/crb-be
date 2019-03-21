<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Obfuscate\Optimuss;

class ChartAccount extends Model
{
    use Optimuss;
    protected $table = 'chart_accounts';
    protected $fillable = [
        'company_id',
        'parent_code',
        'taccount_id',
        'name',
        'account_code',
        'account_display',
    ];

    protected $appends = ['optimus_id'];

    public static function boot() {
        parent::boot();

        static::deleting(function($chartAccount) {
            $chartAccount->children()->delete();
        });
    }

    public function parent(){
        return $this->hasOne('App\Model\ChartAccount', 'id', 'parent_code');
    }
    public function children() {

        return $this->hasMany('App\Model\ChartAccount', 'parent_code', 'account_code');
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

    public function transactions(){
        return $this->hasMany('App\Model\Transaction', 'id', 'chart_account_id');
    }
    public function scopeRelTable($query){

        return $query->with(['allChildren', 'parent', 'company', 'tAccount']);
    }
    
}
