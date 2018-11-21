<?php

namespace App\Http\Controllers\API\Company;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Company;

class CompanyController extends Controller
{

    public function __construct(){

        // $this->authorizeResource(Company::class);
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
        
        return response()->json([

            'company' => Company::where('id',$id)->relTable()->first()
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


    public function searchCompany(Request $request){

        $companies =  Company::where('name', 'like', '%'. $request->search . '%' )->relTable()->get();

        return response()->json([
            
            'companies' => $this->paginate($companies)

        ]);

    }


    public function paginate($collection){

        $request =  app()->make('request');

        return new LengthAwarePaginator($collection->forPage($request->page, $request->perPage), $collection->count(), $request->perPage, $request->page);
    }
}
