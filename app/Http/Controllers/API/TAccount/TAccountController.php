<?php

namespace App\Http\Controllers\API\TAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\TAccount;

class TAccountController extends Controller
{
    
    public function index(){

        return response()->json([
            'tAccounts' => TAccount::all()
        ]);
    }
}
