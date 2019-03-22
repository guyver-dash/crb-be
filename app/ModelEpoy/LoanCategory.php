<?php

namespace App\ModelEpoy;

use Illuminate\Database\Eloquent\Model;

class LoanCategory extends Model
{
    protected $table = 'lmmcategories';
    protected $fillable = ['description','ilacategory','isMicro','misAmort','parent_id'];
}
