<?php

namespace App\Http\Controllers\API\Holding;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Holding;
use App\Model\User;
use Illuminate\Pagination\LengthAwarePaginator;

class HoldingController extends Controller
{

    public function __construct()
    {
        
        $this->authorizeResource(Holding::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $collection = Holding::relTable()->orderBy('created_at', 'asc')->get();
        return response()->json([
                'holdings' => $collection
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
         
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Holding $holding)
    {
        return response()->json([

                'holding' => $holding->relTable()->first()

            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Holding $holding)
    {
        // $holding = Holding::find($id);
        // $this->authorize('view', $holding);

        return response()->json([
                'holding' => $holding->relTable()->first()
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
        
        

        $holding = Holding::find($id); 
        $holding->update($request->all());
        $holding->address()->update([
                'country_id' => $request->country_id,
                'region_id' => $request->region_id,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'brgy_id' => $request->brgy_id
            ]);
        

        return response()->json([
                'holding' => Holding::where('id', $id)
                    ->relTable()->first()
            ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $holding = Holding::find($id);
        $holding->delete();
        return response()->json([
                'success' => true
            ]);
    }


    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }

}
