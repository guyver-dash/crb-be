<?php

namespace App\Http\Controllers\API\Province;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Province;
use App\Model\State;
class ProvinceController extends Controller
{
    
    public function allProvinces(){

    	return response()->json([
    			'provinces'	=> Province::all()
    		]);
    }

    public function states($countryId){

    	return response()->json([
    			'states' => State::where('country_id', $countryId)->get()
    		]);
    }
}
