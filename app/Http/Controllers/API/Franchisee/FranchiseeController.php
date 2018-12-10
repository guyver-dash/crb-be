<?php

namespace App\Http\Controllers\API\Franchisee;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Franchisee;

class FranchiseeController extends Controller
{
    public function __construct(){

        $this->authorizeResource(Franchisee::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');
        $franchisees = Franchisee::where('name', 'like', '%'.$request->filter . '%')
            ->relTable()
            ->orderBy('created_at', 'desc')
            ->get();
        
         
        return response()->json([
            'franchisees' => $this->paginate($franchisees)
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
    public function show(Franchisee $franchisee, Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Franchisee $franchisee, Request $request)
    {
       $franchisee = Franchisee::where('id', $request->id)->relTable()->first();
       return response()->json([
           'franchisee' => $franchisee
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Franchisee $franchisee, Request $request)
    {
        $address =  $request->all()['address'];
        $businessInfo =  $request->all()['business_info'];
        $franchisee = Franchisee::find($request->all()['id']);
        $franchisee->address()->update([
            'country_id' => $address['country_id'],
            'region_id' =>  $address['region_id'],
            'province_id' => $address['province_id'],
            'city_id' => $address['city_id'],
            'brgy_id' =>$address['brgy_id']
        ]);
        $franchisee->businessInfo()->update([
            'business_type_id' => $businessInfo['business_type_id'],
            'vat_type_id' => $businessInfo['vat_type_id'],
            'telephone' => $businessInfo['telephone'],
            'email' => $businessInfo['email'],
            'tin' => $businessInfo['tin'],
            'website' => $businessInfo['website']
        ]);
        $franchisee->update($request->all());

        return response()->json([
            'success' => true,
            'request' => $request->all()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Franchisee $franchisee, Request $request)
    {
        //
    }

    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}
