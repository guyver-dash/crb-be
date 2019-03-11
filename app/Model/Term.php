<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Term extends Model
{
    
    protected $table = 'terms';
    protected $fillable = [
        'name', 'termable_id', 'termable_type'
    ];

    public function branch(){

        return $this->morphByMany();
    }
}
