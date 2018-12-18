<?php

namespace App\Http\Controllers\API\Holding;

use App\Http\Controllers\Controller;
use App\Model\Holding;
use Auth;
use Illuminate\Http\Request;
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

        // $holdings = Holding::relTable()->get();

        // return response()->json([
        //     'holdings' => $collection,
        // ]);

        $request = app()->make('request');

        $sortDirection = $request->descending === 'false' ? 'asc' : 'desc';

        $holdings = Holding::where('name', 'like', '%' . $request->filter . '%')
            ->when($request->sortBy === 'name', function ($q) use ($sortDirection) {
                $q->orderBy('name', $sortDirection);
            })
            ->orWhereHas('address', function ($q1) use ($request) {
                $q1->where('street_lot_blk', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.brgy', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.province', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.city', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->orWhereHas('address.region', function ($q1) use ($request) {
                $q1->where('description', 'like', '%' . $request->filter . '%');
            })
            ->relTable()->get();

        return response()->json([

            'holdings' => $this->paginate($holdings),

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $holding = Holding::create($request->all());
        $holding = Holding::find($holding->id);
        $holding->address()->create([
            'country_id' => $request->country_id,
            'region_id' => $request->region_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'brgy_id' => $request->brgy_id,
            'street_lot_blk' => $request->street_lot_blk,
        ]);
        $holding->businessInfo()->create([
            'business_type_id' => $request->business_type_id,
            'vat_type_id' => $request->vat_type_id,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'tin' => $request->tin,
            'website' => $request->website,
        ]);

        return response()->json([
            'success' => $request->all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Holding $holding, Request $request)
    {
        $holding = Holding::where('id', $request->id)->relTable()->first();

        return response()->json([
            'holding' => $holding,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Holding $holding, Request $request)
    {

        $holding = Holding::where('id', $request->id)->relTable()->first();

        return response()->json([
            'holding' => $holding,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Holding $holding, Request $request)
    {

        $holding = Holding::where('id', $request->id)->first();
        $holding->update($request->all());
        $holding->address()->update([
            'country_id' => $request->country_id,
            'region_id' => $request->region_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'brgy_id' => $request->brgy_id,
        ]);
        $holding->businessInfo()->update([
            'business_type_id' => $request->business_type_id,
            'vat_type_id' => $request->vat_type_id,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'tin' => $request->tin,
            'website' => $request->website,
        ]);
        return response()->json([
            'holding' => Holding::where('id', $request->id)->first(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Holding $holding, Request $request)
    {
        $holding = Holding::find($request->id);
        $holding->delete();
        return response()->json([
            'success' => true,
        ]);
    }

    public function userHoldings()
    {
        $holdings = Holding::whereHas('accessRights.roles.users', function ($q) {
            return $q->where('users.id', Auth::User()->id);
        })->get();
        return response()->json([
            'userHoldings' => $holdings,
        ]);

    }

    public function paginate($collection)
    {

        $request = app()->make('request');
        $perPage = $request->perPage === '0' ? $collection->count() :  $request->perPage;

        return new LengthAwarePaginator($collection->forPage($request->page, $perPage), $collection->count(), $perPage, $request->page);
    }
}
