<?php

namespace App\Http\Controllers\API\Vendors;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Traits\PaginateCollection;
use App\Model\Item;
use App\Model\User;
use Carbon\Carbon;
use Auth;

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
        
        $vendors = collect([$items->branches, $items->commissaries, $items->logistics, $items->otherVendors])
                        ->filter(function($item){
                            return $item != null;
                        })
                        ->flatten(1);
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

        $vendor =   $request->vendorable_type::where('id', $request->vendorable_id)
                        ->relTable()
                        ->first();
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDAte = Carbon::parse($request->end_date)->format('Y-m-d');
        $vendor->items()->attach($request->item_id, [
            'created_by' => Auth::User()->id,
            'rank' => $request->rank ,
            'dis_percentage' => $request->dis_percentage,
            'start_date' => $startDate,
            'end_date' => $endDAte,
            'price' => $request->price,
            'volume' => $request->volume,
            'remarks' => $request->remarks,
            'vendorable_id' => $request->vendorable_id,
            'vendorable_type' => $request->vendorable_type
        ]);
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
        $vendor =  $request->vendorable_type::where('id', $request->vendorable_id)
                    ->relTable()
                    ->first();
        
        $vendorable = $vendor->items()
                    ->newPivotStatement()
                    ->where('id', $request->id)
                    ->first();
        $createdBy = User::find($vendorable->created_by);
        $approvedBy = User::find($vendorable->approved_by);

        if ($approvedBy !== null) {
            $approvedBy = $approvedBy->lastname . ', ' . $approvedBy->middlename. ' ' . $approvedBy->lastname;
        }

        return response()->json([
            'vendorName' => $vendor->name,
            'createdBy' => $createdBy->lastname . ', ' . $createdBy->middlename . ' ' . $createdBy->lastname,
            'approvedBy' =>  $approvedBy,
            'vendorable' => $vendorable
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
        
        $vendorable = $vendor->items()
                    ->newPivotStatement()
                    ->where('id', $request->id)
                    ->first();
        $createdBy = User::find($vendorable->created_by);
        $approvedBy = User::find($vendorable->approved_by);

        if ($approvedBy !== null) {
            $approvedBy = $approvedBy->lastname . ', ' . $approvedBy->middlename. ' ' . $approvedBy->lastname;
        }

        return response()->json([
            'vendorName' => $vendor->name,
            'createdBy' => $createdBy->lastname . ', ' . $createdBy->middlename . ' ' . $createdBy->lastname,
            'approvedBy' =>  $approvedBy,
            'vendorable' => $vendorable
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
        $vendor = $request->vendorable_type::where('id', $request->vendorable_id)->first();
        $startDate = Carbon::parse($request->start_date)->format('Y-m-d');
        $endDAte = Carbon::parse($request->end_date)->format('Y-m-d');

        $vendor->items()->newPivotStatement()
                    ->where('id', $request->id)
                    ->update([
                            'rank' => $request->rank ,
                            'dis_percentage' => $request->dis_percentage,
                            'start_date' => $startDate,
                            'end_date' => $endDAte,
                            'price' => $request->price,
                            'volume' => $request->volume,
                            'remarks' => $request->remarks
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
        $request = app()->make('request');
        $vendor =  $request->vendorable_type::where('id', $request->vendorable_id)
                    ->relTable()
                    ->first();
        
        $vendorable = $vendor->items()
                    ->newPivotStatement()
                    ->where('id', $request->id)
                    ->delete();
        
        return response()->json([
            'success' => true
        ]);
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
