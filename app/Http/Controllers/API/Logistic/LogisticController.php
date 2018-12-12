<?php

namespace App\Http\Controllers\API\Logistic;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Logistic;
use App\Traits\PaginateCollection;

class LogisticController extends Controller
{
    use PaginateCollection;

    public function __construct(){

        $this->authorizeResource(Logistic::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return response()->json([

            'logistics' => $this->paginate(
                Logistic::where('name', 'like', '%'. app()->make('request')->filter . '%')
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
    public function store(Logistic $logistic, Request $request)
    {
        $logistic = Logistic::create($request->all());
        $logistic = Logistic::find($logistic->id);
        $logistic->address()->create($request['address']);
        $logistic->businessInfo()->create($request['business_info']);

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
    public function show(Logistic $logistic, Request $request)
    {
        return response()->json([
            'logistic' => Logistic::where('id', $request->id)
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
    public function edit(Logistic $logistic, Request $request)
    {
        return response()->json([
            'logistic' => Logistic::where('id', $request->id)
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
    public function update(Logistic $logistic, Request $request)
    {
        
        $logistic = Logistic::find($request->id);
        $logistic->update($request->all());
        $logistic->address()->update([
            'country_id' => $request->address['country_id'],
            'region_id' =>  $request->address['region_id'],
            'province_id' =>  $request->address['province_id'],
            'city_id' =>  $request->address['city_id'],
            'brgy_id' =>  $request->address['brgy_id'],
        ]);
        $logistic->businessInfo()->update([
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
    public function destroy(Logistic $logistic, Request $request)
    {
        Logistic::find($request->id)->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
