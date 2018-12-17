<?php

namespace App\Http\Controllers\API\Vendors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\PaginateCollection;
use App\Model\Item;

class VendorableController extends Controller
{
    use PaginateCollection;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $items =  Item::where('id', app()->make('request')->id)
                    ->relTable()
                    ->orderBy('created_at', 'desc')
                    ->first();
        
        $vendors = collect([$items->branches, $items->logistics, $items->commissaries])->flatten(1);
        return response()->json([

            'vendors' => $this->paginate($vendors) 

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
        $request = app()->make('request');
        $vendor =  $request->vendorable_type::where('id', $request->vendorable_id)->relTable()->first();
        ;
        return response()->json([
            'vendorName' => $vendor->name,
            'vendorable' => $vendor->items->where('id', $request->id)->first()
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
        $request = app()->make('request');
        $vendor =  $request->pivot['vendorable_type']::where('id', $request->pivot['vendorable_id'])
            ->relTable()
            ->first();
        ;
        $vendor->items()->update([
            
        ]);
        return response()->json([

            'vendor' => $vendor
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
        //
    }


    public function vendorablesCount(){

        $items =  Item::where('id', app()->make('request')->id)
                    ->relTable()
                    ->orderBy('created_at', 'desc')
                    ->first();
        
        $vendors = collect([$items->branches, $items->logistics, $items->commissaries])->flatten(1);

        return response()->json([
            'count' => count($vendors)
        ]);
    }
}
