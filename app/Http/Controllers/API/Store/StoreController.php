<?php

namespace App\Http\Controllers\API\Store;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Store;
use App\Model\Branch;
class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json([
            'stores' => Store::relTable()
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
        $store = Store::where('id', $id)
                    ->relTable()
                    ->first();

        return response()->json([
                'store' => $store
            ]);
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


    public function search(){

        $request = app()->make('request');

        return response()->json([
            'stores' => Store::where('name', 'LIKE', '%'. $request->name . '%')
            ->with('address')
            ->take(10)->get()
            ]);
    }


    public function searchStorePlace(){

        $request = app()->make('request');

        $stores = Store::where('name', 'LIKE', "%{$request->search}%")
        ->take(30)
        ->with(['address.province', 'address.city', 'address.brgy'])
        ->get();


        $branches = Branch::where('name', 'LIKE', "%{$request->search}%")
        ->take(30)
        ->with(['address.province', 'address.city', 'address.brgy'])
        ->orderBy('name', 'asc')
        ->get();

        $collection = collect();

        foreach ($stores as $store)
            $collection->push($store);
        foreach ($branches as $branch)
            $collection->push($branch);


            return response()->json([
                    'stores' => $collection
                ]);
        
        

    }

    public function searchStoreIncludePlaces(){

        $request = app()->make('request');

        $stores = Store::where('name', 'LIKE', "%{$request->search}%")
        ->orWhereHas('address.province', function ($query) use ($request) {
            $query->where('provDesc', 'LIKE', "%{$request->search}%");
        })
        ->orWhereHas('address.city', function ($query) use ($request) {
            $query->where('citymunDesc', 'LIKE', "%{$request->search}%");
        })
        ->with(['address.province', 'address.city', 'address.brgy'])
        ->get();


        $branches = Branch::where('name', 'LIKE', "%{$request->search}%")
        ->orWhereHas('address.province', function ($query) use ($request) {
            $query->where('provDesc', 'LIKE', "%{$request->search}%");
        })
        ->orWhereHas('address.city', function ($query) use ($request) {
            $query->where('citymunDesc', 'LIKE', "%{$request->search}%");
        })
        ->with(['address.province', 'address.city', 'address.brgy'])
        ->get();

        $collection = collect();

        foreach ($stores as $store)
            $collection->push($store);
        foreach ($branches as $branch)
            $collection->push($branch);
        

        $newStores = collect( $collection)->filter(function ($store) use ($request) {
            // replace stristr with your choice of matching function
            return false !== stristr($store->address->province->provDesc, $request->search) || false !== stristr($store->address->city->citymunDesc, $request->search);

        })->values()->all();


         return response()->json([
                    'stores' => $newStores
                ]);
    }
}
