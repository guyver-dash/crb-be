<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected $fillable = [
        'jobable_id', 'jobable_type', 'name'
    ];

    public function jobable(){

        return $this->morphTo();
    }
}
