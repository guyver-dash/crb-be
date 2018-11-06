<?php

namespace App\Http\Controllers\API\Brgy;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Brgy;
use App\Model\City;

class BrgyController extends Controller
{
    
    public function getBrgy($citymunCode){

    	return response()->json([
    			'brgys' => Brgy::where('citymunCode', $citymunCode)->get(),
    			'city' => City::where('citymunCode', $citymunCode)->first()->citymunDesc
    		]);
    }

    public function selectedBrgy($brgyCode){

    	return response()->json([
    			'brgy' => Brgy::where('brgyCode', $brgyCode)->first()->brgyDesc
    		]);
    }
}
