<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\DateTimeFormat;

class Commissary extends Model
{
    
    use DateTimeFormat;
    protected $table = 'commissaries';
    protected $fillable = [
    	'name', 'desc'
    ]; 

    public static function boot() {
        parent::boot();

        static::deleting(function($commissary) {
            $commissary->address()->delete();
            $commissary->businessInfo()->delete();
        });
    }

    public function businessInfo(){

        return $this->morphOne('App\Model\BusinessInfo', 'businessable');
    }

    public function address(){

    	return $this->morphOne('App\Model\Address', 'addressable');
    }

    public function items()
    {
        return $this->morphToMany('App\Model\Item', 'vendorable')->withPivot('id','rank', 'dis_percentage', 'start_date', 'end_date', 'price', 'volume', 'remarks', 'created_by', 'approved_by');
    }

    public function accessRights()
    {
        return $this->morphToMany('App\Model\AccessRight', 'accessable');
    }

    public function scopeRelTable($query){
        return $query->with(['businessInfo', 'address.country', 'address.region','address.province', 'address.city', 'address.brgy', 'items']);
    }
}
