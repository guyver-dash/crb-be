<?php

namespace App\Http\Controllers\API\Company;

use App\Http\Controllers\Controller;
use App\Model\Company;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyController extends Controller
{

    public function __construct()
    {

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

        $sortDirection = $request->descending === 'false' ? 'asc' : 'desc';

        $companies = Company::where('name', 'like', '%' . $request->filter . '%')
        // ->when($request->sortBy === 'holding', function ($q) use ($sortDirection) {
        //     $q->orWhereHas('holding', function ($qh) use ($sortDirection) {
        //         $qh->orderBy('name', $sortDirection);
        //     });
        // })
            ->when($request->sortBy === 'name', function ($q) use ($sortDirection) {
                $q->orderBy('name', $sortDirection);
            })
            ->orWhereHas('holding', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->filter . '%');
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

        return [
            'companies' => $this->paginate($companies),
            'sortBy' => $request->sortBy,
            'descending' => $request->descending,
            'direction' => $sortDirection,
        ];
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
        $company = Company::create($request->all());
        $holding = Company::find($company->id);
        $company->address()->create([
            'country_id' => $request->country_id,
            'region_id' => $request->region_id,
            'province_id' => $request->province_id,
            'city_id' => $request->city_id,
            'brgy_id' => $request->brgy_id,
            'street_lot_blk' => $request->street_lot_blk,
        ]);
        $company->businessInfo()->create([
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
    public function show(Company $company, Request $request)
    {
        return response()->json([

            'company' => Company::where('id', $request->id)->relTable()->first(),
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

            'company' => Company::where('id', $request->id)->relTable()->first(),
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
            'brgy_id' => $request->brgy_id,
        ]);
        $company->businessInfo()->update([
            'business_type_id' => $request->business_type_id,
            'vat_type_id' => $request->vat_type_id,
            'telephone' => $request->telephone,
            'email' => $request->email,
            'tin' => $request->tin,
            'website' => $request->website,
        ]);

        return response()->json([
            'company' => Company::where('id', $request->id)->relTable()->first(),
            'success' => true,
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
            'success' => true,
        ]);
    }

    public function paginate($collection)
    {

        $request = app()->make('request');
        $perPage = $request->perPage === '0' ? $collection->count() :  $request->perPage;

        // return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
        return new LengthAwarePaginator($collection->forPage($request->page, $perPage), $collection->count(), $perPage, $request->page);
    }

    public function companyHoldings(Request $request)
    {
        $company = Company::where('id', $request->id)
            ->with('holding')->first();
        return response()->json([
            'holdings' => $company->holding,
        ]);
    }

    public function userCompanies()
    {
        $companies = Company::whereHas('accessRights.roles.users', function ($q) {
            return $q->where('users.id', Auth::User()->id);
        })->get();
        return response()->json([
            'userCompanies' => $companies,
        ]);

    }
}
