<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    
    protected $table = 'informations';
    protected $fillable = ['employee_id', 'user_id', 'gender_id', 'birthdate', 'mobile', 'nationality', 'civil_status_id'];
}
