<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BusinessInfo extends Model
{
    
    protected $table = 'business_infos';
    protected $fillable = [
    	'business_id', 'business_type', 'business_type_id', 'vat_type_id',
    	'telephone', 'email', 'tin', 'website'

    ];

    public function businessable(){

    	 return $this->morphTo();
    }

    public function businessType(){
        return $this->hasOne('App\Model\BusinessType', 'id', 'business_type_id');
    }

    public function vatType(){
        return $this->hasOne('App\Model\VatType', 'id', 'vat_type_id');
    }
}
