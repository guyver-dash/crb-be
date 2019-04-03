<?php

namespace App\ModelEpoy;

use Illuminate\Database\Eloquent\Model;

class LoanCategory extends Model
{
    protected $table = 'loan_categories';
    protected $fillable = ['description','ilacategory','isMicro','misAmort','parent_id'];
}
