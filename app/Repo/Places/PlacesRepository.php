<?php 

namespace App\Repo\Places;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Province;
use App\Model\City;
use App\Model\Brgy;

class PlacesRepository extends BaseRepository implements PlacesInterface{

    public function provinces(){
        return Province::orderBy('description', 'asc')->get();
    }

    public function cities($provinceId){
        return City::where('province_id', $provinceId)->orderBy('description', 'asc')->get();
    }

    public function brgys($cityId){
        return Brgy::where('city_id', $cityId)->orderBy('description', 'asc')->get();
    }
}