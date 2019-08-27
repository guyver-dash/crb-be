<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'accounts';
    protected $fillable = [
        'branch_id',
        'information_id',
        'savings_id',
        'status'
    ];

    public function information()
    {
        return $this->hasOne('App\Model\Information', 'id', 'information_id');
    }
}
