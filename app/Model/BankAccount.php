<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Encryptable;

class BankAccount extends Model
{

    use Encryptable;

    protected $table = 'bank_accounts';
    protected $fillable = [
        'bank_name',
        'account_no',
        'account_name'
    ];
    protected $encryptable = [
        'account_no',
        'account_name'
    ];



}
