<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    
    protected $table = 'companies';
    protected $fillable = [
    	'name', 'desc'
    ];

    public function branches(){

        return $this->hasMany('App\Model\Branch', 'id', 'branch_id');
    }


    public function scopeRelTable($q){

        return $q->with(['branches']);
    }
}
