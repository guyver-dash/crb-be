<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillabe = [
        'path', 'imageable_id', 'imageable_type',
        'is_primary', 'name', 'desc'
    ];

    public function imageable(){
    	return $this->morphTo();
    }

    public function getPathAttribute($val){
        return url($val);
    }
}
