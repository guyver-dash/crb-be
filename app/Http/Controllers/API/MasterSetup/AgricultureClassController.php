<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MasterSetup\AgricultureClass;

class AgricultureClassController extends Controller
{
    public function show()
    {

       return response()->json([
            'AgricultureClass' => AgricultureClass::get()
        ]);
    }
}
