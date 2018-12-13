<?php

namespace App\Http\Controllers\API\OtherVendor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\OtherVendor;
use App\Traits\PaginateCollection;

class OtherVendorController extends Controller
{
    use PaginateCollection;

    public function __construct(){

        $this->authorizeResource(OtherVendor::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([

            'otherVendors' => $this->paginate(
                OtherVendor::where('name', 'like', '%'. app()->make('request')->filter . '%')
                        ->relTable()
                        ->orderBy('created_at', 'desc')
                        ->get()
            )

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
    public function store(OtherVendor $otherVendor, Request $request)
    {
        $otherVendor = OtherVendor::create($request->all());
        $otherVendor = OtherVendor::find($otherVendor->id);
        $otherVendor->address()->create($request['address']);
        $otherVendor->businessInfo()->create($request['business_info']);

        return response()->json([
                'success' => true
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(OtherVendor $otherVendor, Request $request)
    {
        return response()->json([
            'otherVendor' => OtherVendor::where('id', $request->id)
                            ->relTable()
                            ->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OtherVendor $otherVendor, Request $request)
    {
        return response()->json([
            'otherVendor' => OtherVendor::where('id', $request->id)
                            ->relTable()
                            ->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OtherVendor $otherVendor, Request $request)
    {
        $otherVendor = OtherVendor::find($request->id);
        $otherVendor->update($request->all());
        $otherVendor->address()->update([
            'country_id' => $request->address['country_id'],
            'region_id' =>  $request->address['region_id'],
            'province_id' =>  $request->address['province_id'],
            'city_id' =>  $request->address['city_id'],
            'brgy_id' =>  $request->address['brgy_id'],
        ]);
        $otherVendor->businessInfo()->update([
            'business_type_id' => $request->business_info['business_type_id'],
            'vat_type_id' => $request->business_info['vat_type_id'],
            'telephone' => $request->business_info['telephone'],
            'email' => $request->business_info['email'],
            'tin' => $request->business_info['tin'],
            'website' => $request->business_info['website'],
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
    public function destroy(OtherVendor $otherVendor, Request $request)
    {
        OtherVendor::find($request->id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
