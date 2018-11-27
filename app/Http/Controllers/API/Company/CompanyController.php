<?php

namespace App\Http\Controllers\API\Company;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Company;

class CompanyController extends Controller
{

    public function __construct(){

        $this->authorizeResource(Company::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $request = app()->make('request');

        $companies =  Company::where('name', 'like', '%'. $request->filter . '%')
            ->relTable()->get();

        return response()->json([

            'companies' => $this->paginate($companies)

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
    public function show(Company $company, Request $request)
    {
        return response()->json([

            'company' => Company::where('id',$request->id)->relTable()->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Request $request)
    {
        
        return response()->json([

            'company' => Company::where('id',$request->id)->relTable()->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Company $company, Request $request)
    {

        $company = Company::where('id', $request->id)->first();
        $company->update($request->all());
        $company->address()->update([
                'country_id' => $request->country_id,
                'region_id' => $request->region_id,
                'province_id' => $request->province_id,
                'city_id' => $request->city_id,
                'brgy_id' => $request->brgy_id
            ]);
        $company->businessInfo()->update([
                'business_type_id' => $request->business_type_id,
                'vat_type_id' => $request->vat_type_id,
                'telephone' => $request->telephone,
                'email' => $request->email,
                'tin' => $request->tin,
                'website' => $request->website
            ]);
        
        return response()->json([
            'company' => Company::where('id',$request->id)->relTable()->first(),
            'success' => true
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $Company, Request $request)
    {
        $company = Company::find($request->id);
        $company->delete();
        return response()->json([
                'success' => true
            ]);
    }



    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }


    public function companyHoldings(Request $request){
        $company = Company::where('id', $request->id)
        ->with('holding')->first();
        return response()->json([
            'holdings' => $company->holding
        ]);
    }
}
