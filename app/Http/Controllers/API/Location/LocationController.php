<?php

namespace App\Http\Controllers\API\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brgy;
use App\Model\City;
use App\Model\Country;
use App\Model\Province;
use App\Model\Region;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSampleBarangays()
    {
        $brgy = Brgy::with('city', 'province', 'region', 'region.country')->inRandomOrder()->limit(5)->get();
        if ($brgy) {
            return $brgy;
        }
    }

    public function getBarangayByName($barangay, $limit)
    {
        $brgy = Brgy::with('city', 'province', 'region', 'region.country')
            ->where('description', 'LIKE', "%$barangay%")
            ->take($limit)
            ->get();
        if ($brgy) {
            return $brgy;
        }
        return response()->json(['status' => 0, 'message' => 'Location not found.']);
    }

    public function getCitiesByName($param, $limit)
    {
        if ($param === 'random-cities') {
            $city = City::with('province', 'region', 'region.country')
                ->inRandomOrder()
                ->take($limit)
                ->get();
        } else {
            $city = City::with('province', 'region', 'region.country')
                ->where('description', 'LIKE', "%$param%")
                ->take($limit)
                ->get();
        }

        if ($city) {
            return $city;
        }
        return response()->json(['status' => 0, 'message' => 'Location not found.']);
    }

    public function getBarangayByCityId($cityId)
    {
        $brgy = Brgy::with('city', 'province', 'region', 'region.country')
            ->where('city_id', '=', $cityId)
            ->get();
        if ($brgy) {
            return $brgy;
        }
        return response()->json(['status' => 0, 'message' => 'Location not found.']);
    }
}
