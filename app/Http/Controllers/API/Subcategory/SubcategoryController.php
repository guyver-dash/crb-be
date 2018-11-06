<?php

namespace App\Http\Controllers\API\Subcategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\SubCategory;
use Illuminate\Pagination\LengthAwarePaginator;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coll = SubCategory::relTable()->get();
        
        return response()->json([
                'subcategories' => $this->paginatePage($coll)
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
        SubCategory::create($request->all());
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
        
        return response()->json([
                'subcategory' => SubCategory::where('id', $id)->with('categories')->first()
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
        
        SubCategory::find($id)->update($request->all());
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
        
         SubCategory::find($id)->delete();
         return $this->index();
    }

    public function search(){

        $request = app()->make('request');
        $subCat = SubCategory::where('name', 'like', '%'. $request->search . '%')
                            ->relTable()->get();
        return response()->json([
                'subcategories' => $this->paginatePage($subCat)
            ]);
    }

    public function paginatePage($collection){

       $request = app()->make('request');
       return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);

        
    }

    public function getSub(){
         
         return response()->json([
                'subcategories' => SubCategory::all()
            ]);
    }

    public function getSubcategories($categoryId){

        return response()->json([
                'subcategories' => SubCategory::where('category_id', $categoryId)->get()
            ]);
    }
}
