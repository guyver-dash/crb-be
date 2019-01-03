<?php 

namespace App\Repo;
use App\Model\BusinessInfo;
use App\Model\Address;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseInterface{

    protected $modelName;

    public function all(){

        return $this->modelName->all();
    }
    
    public function create($array){

        return $this->modelName->create($array);
    }
    public function where($name, $operator, $value = null){
        
       if($value === null){
        return $this->modelName->where($name, $operator);
       }
       return $this->modelName->where($name, $operator, $value);
    }

    public function update($array){
        return $this->modelName->update($array);
    }

    public function find($id){
        return $this->modelName->find($id);
    }


    public function entityNameAddress($request){

        return $this->modelName->where('name', 'like', '%' . $request->filter . '%')
            ->when($request->sortBy === 'name', function ($q) use ($request) {
                $q->orderBy('name', $request->descending === 'false' ? 'asc' : 'desc');
            })
            ->orWhereHas('address', function ($q1) use ($request) {
                $q1->where('street_lot_blk', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.brgy', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.province', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.city', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.region', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            });
    }

    public function paginate($collection){
        
        $request = app()->make('request');
        $perPage = $request->perPage === '0' ? $collection->count() :  $request->perPage;

        return new LengthAwarePaginator($collection->forPage($request->page, $perPage), $collection->count(), $perPage, $request->page);
    }

    public function addressFillable($array){

        $address = new Address;

        return collect($array)->filter(function($value, $key) use ($address) {
            return in_array($key, $address->getFillable() );
        })->toArray();
        
    }

    public function businessInfoFillable($array){

        $businessInfo = new BusinessInfo;

        return collect($array)->filter(function($value, $key) use ($businessInfo) {
            return in_array($key, $businessInfo->getFillable() );
        })->toArray();

    }


    
}