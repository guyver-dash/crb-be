<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    
    protected $table = 'images';
    protected $fillable = [

    	'path', 'imageable_id', 'imageable_type', 'name', 'desc', 'size'
    	
    ];

    public function imageable(){

    	return $this->morphTo();
    }

    public function getPathAttribute($val){

        return asset($val);
    }
}
