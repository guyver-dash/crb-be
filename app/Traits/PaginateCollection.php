<?php 

namespace App\Traits;

use Illuminate\Pagination\LengthAwarePaginator;

trait PaginateCollection
{
    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}