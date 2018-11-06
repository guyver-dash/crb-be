<?php

namespace App\Http\Controllers\API\FurtherCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\FurtherCategory;
use Illuminate\Pagination\LengthAwarePaginator;

class FurtherCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $furtherCat = FurtherCategory::relTable()->get();
        return response()->json([
                'furtherCategories' => $this->paginatePage($furtherCat)
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        
        FurtherCategory::create($request->all());
        return $this->index();
        
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $furtherCat = FurtherCategory::where('id', $id)->relTable()->first();

        return response()->json([

                'furtherCat' => $furtherCat
                
            ]);
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
        
        $furtherCat = FurtherCategory::find($id)->update($request->all());

        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FurtherCategory::find($id)->delete();
        return $this->index();
    }


    public function paginatePage($collection){

       $request = app()->make('request');
       return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);

        
    }

    public function search(){

        $request = app()->make('request');
        $subCat = FurtherCategory::where('name', 'like', '%'. $request->search . '%')
                            ->relTable()->get();
        return response()->json([
                'furtherCategories' => $this->paginatePage($subCat)
            ]);
    }

    public function getFurther($subcategoryId){

        return response()->json([
                'furtherCategories' => FurtherCategory::where('subcategory_id', $subcategoryId)->get()
            ]);
    }
}
