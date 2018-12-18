<?php

namespace App\Http\Controllers\API\Vendors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\PaginateCollection;
use App\Model\Item;
use App\Model\User;
use Carbon\Carbon;

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
        $request = app()->make('request');
        $vendor =  $request->vendorable_type::where('id', $request->vendorable_id)->relTable()->first();
        ;
        return response()->json([
            'vendorName' => $vendor->name,
            'vendorable' => $vendor->items->where('id', $request->id)->first()
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
        $request = app()->make('request');
        $vendor =  $request->vendorable_type::where('id', $request->vendorable_id)
                    ->relTable()
                    ->first();
        $item = $vendor->items
                    ->where('id', $request->id)
                    ->first();
        $createdBy = User::find($item->pivot->created_by);
        $approvedBy = User::find($item->pivot->approved_by);
        return response()->json([
            'vendorName' => $vendor->name,
            'createdBy' => $createdBy->lastname . ', ' . $createdBy->middlename . ' ' . $createdBy->lastname,
            'approvedBy' => $approvedBy->lastname . ', ' . $approvedBy->middlename. ' ' . $approvedBy->lastname,
            'vendorable' => $item
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
        $vendor = $request->pivot['vendorable_type']::where('id', $request->pivot['vendorable_id'])->first();
        $startDate = Carbon::parse($request->pivot['start_date'])->format('Y-m-d');
        $endDAte = Carbon::parse($request->pivot['end_date'])->format('Y-m-d');

        $vendor->items()->newPivotStatement()
                    ->where('id', $request->pivot['id'])
                    ->update([
                            'rank' => $request->pivot['rank'] ,
                            'dis_percentage' => $request->pivot['dis_percentage'],
                            'start_date' => $startDate,
                            'end_date' => $endDAte,
                            'price' => $request->pivot['price'],
                            'volume' => $request->pivot['volume'],
                            'remarks' => $request->pivot['remarks']
                        ]);

        return response()->json([

            'success' => true
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
