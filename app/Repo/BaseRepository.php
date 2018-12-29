<?php 

namespace App\Repo;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseInterface{

    protected $modelName;
    public function all(){

        return $this->modelName->all();
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

    public function paginate($collection){
        
        $request = app()->make('request');
        $perPage = $request->perPage === '0' ? $collection->count() :  $request->perPage;

        return new LengthAwarePaginator($collection->forPage($request->page, $perPage), $collection->count(), $perPage, $request->page);
    }
}