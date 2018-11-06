<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Personal extends Model
{

   protected $table = 'personal';
   protected $fillable= [
   			'gender_id',
   			'mothers_maiden_name',
   			'nationality',
   			'birthdate',
   			'birthplace',
   			'marital_status',
   			'spouse_name'
   ];
}
