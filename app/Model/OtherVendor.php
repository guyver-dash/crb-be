<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormat;
use App\Traits\Model\Items;

class OtherVendor extends Model
{
    use DateTimeFormat, Items;
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

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    public function scopeRelTable($query){
        return $query->with(['items', 'businessInfo', 'address.country', 'address.region','address.province', 'address.city', 'address.brgy']);
    }
}
