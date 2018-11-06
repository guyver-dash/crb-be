<?php

namespace App\Http\Controllers\API\ItemInfo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Model\ItemInfo;
use App\Model\Category;
use App\Model\SubCategory;
use App\Model\FurtherCategory;
class ItemInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemInfo =  ItemInfo::orderBy('created_at', 'ASC')->relTable()->get();

        return response()->json([
                'itemInfo' => $this->paginatePage($itemInfo)
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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


    public function getItems(){

        $request = app()->make('request');
        $items = '';
        if ($request->provId != '') {
            $items = ItemInfo::where('provCode', $request->provId )->relTable()->orderBy('created_at', 'DESC')->get();

        }else {
            $items = ItemInfo::relTable()->orderBy('created_at', 'DESC')->get();
        }
        if ($request->cityId != null ) {
            $items = ItemInfo::where('citymunCode', $request->cityId )->relTable()->orderBy('created_at', 'DESC')->get();
        }
        
        $unique = $items->unique('item_id');
        
        $paginated = $this->paginatePage(collect($unique->values()->all()));

         return response()->json([
            'itemInfo' => $paginated
        ]);
    }
    public function cat(){
        $request = app()->make('request');

        $itemInfo = ItemInfo::where('category_id', $request->catId )->relTable()->orderBy('created_at', 'DESC')->get();

        $unique = $itemInfo->unique('item_id');

        return response()->json([
            'itemInfo' => $this->paginatePage(collect($unique->values()->all())),
            'categoryName' => Category::find($request->catId)->name,

        ]);
    }

    public function subCat(){

        $request = app()->make('request');

        $items = ItemInfo::where('subcategory_id', $request->subId )->relTable()->orderBy('created_at', 'DESC')->get();

        $unique = $items->unique('item_id');
        
        $paginated = $this->paginatePage(collect($unique->values()->all()));

        return response()->json([
            'itemInfo' => $paginated,
            'subcategoryName' => SubCategory::find($request->subId)->name

        ]);

    }

    public function furtherCat(){

        $request = app()->make('request');

        $items = ItemInfo::where('further_category_id', $request->furthCat )->relTable()->orderBy('created_at', 'DESC')->get();

        $unique = $items->unique('item_id');
        
        $paginated = $this->paginatePage(collect($unique->values()->all()));

        return response()->json([
            'itemInfo' => $paginated,
            'furtherCategoryName' => FurtherCategory::find($request->furthCat)->name

        ]);

    }

    public function paginatePage($collection){

        $request = app()->make('request');
       $paginator =  new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
       if (count($paginator) > 0){
            return $paginator;
       }else{

          return  new LengthAwarePaginator($collection->forPage(1, $request->perPage), $collection->count(), $request->perPage, 1);
       }

        
    }
}
