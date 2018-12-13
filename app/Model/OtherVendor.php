<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormat;

class OtherVendor extends Model
{
    use DateTimeFormat;
    protected $table = 'other_vendors';
    protected $fillable = [
    	'name', 'desc'
    ]; 

    public static function boot() {
        parent::boot();

        static::deleting(function($otherVendor) {
            $otherVendor->address()->delete();
            $otherVendor->businessInfo()->delete();
        });
    }

    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function scopeRelTable($query){
        return $query->with(['businessInfo', 'address.country', 'address.region','address.province', 'address.city', 'address.brgy']);
    }
}
