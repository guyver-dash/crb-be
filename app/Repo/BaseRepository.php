<?php 

namespace App\Repo;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseInterface{

    protected $modelName;

    public function where($name, $operator, $value){
       
       return $this->modelName->where($name, $operator, $value);
    }

    public function update($array){
        return $this->modelName->update($array);
    }

    public function find($id){
        return $this->modelName->find($id);
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}