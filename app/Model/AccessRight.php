<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AccessRight extends Model
{
    protected $table = 'access_rights';
    protected $fillable = ['name'];
}
