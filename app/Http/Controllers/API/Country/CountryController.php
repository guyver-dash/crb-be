<?php

namespace App\Http\Controllers\API\Country;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Country;

class CountryController extends Controller
{
    

    public function allCountries(){

    	return response()->json([
    			'countries' => Country::all()
    		]);
    }
}
