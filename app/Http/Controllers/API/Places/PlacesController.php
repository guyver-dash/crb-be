<?php

namespace App\Http\Controllers\Api\Places;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Places\PlacesInterface;

class PlacesController extends Controller
{

    protected $places;

    public function __construct(PlacesInterface $places){
        $this->places = $places;
    }
    
    public function provinces()
    {
        return response()->json([
            'provinces' => $this->places->provinces()
        ]);
    }

    public function cities($provinceId){

        return response()->json([
            'cities' => $this->places->cities($provinceId)
        ]);
    }

    public function brgys($cityId){

        return response()->json([
            'brgys' => $this->places->brgys($cityId)
        ]);
    }

}
