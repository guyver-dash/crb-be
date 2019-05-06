<?php

namespace App\Http\Controllers\API\MasterSetup;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\MasterSetup\AgriculturalPurpose;

class AgriculturalPurposeController extends Controller
{
     public function show()
    {

       return response()->json([
            'AgriculturalPurpose' => AgriculturalPurpose::get()
        ]);
    }
}
