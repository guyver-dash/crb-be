<?php

namespace App\Http\Controllers\API\ChartAccount;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\ChartAccount\ChartAccountInterface;
use App\Model\ChartAccount;
use App\Model\Company;

class ChartAccountController extends Controller
{
    protected $chartAccount;

    public function __construct(ChartAccountInterface $chartAccount)
    {

        $this->authorizeResource(ChartAccount::class);
        $this->chartAccount = $chartAccount;
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');

        $chartAccounts = $this->chartAccount->where('company_id', $request->companyId)
            ->where('parent_id', '=', 0)
            ->relTable()
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'chartAccounts' => $chartAccounts
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
        

        return response()->json([
            'success' => $this->chartAccount->create($request)
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ChartAccount $chartAccount, Request $request)
    {
        return response()->json([
            'chartAccount' => $this->chartAccount->where('id', $request->id)
                                ->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ChartAccount $chartAccount, Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ChartAccount $chartAccount, Request $request)
    {
        $this->chartAccount->find($request->id)
            ->update($request->all());

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
    public function destroy(ChartAccount $chartAccount, Request $request)
    {
        $this->chartAccount->find($request->id)->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function companies(Request $request){

        return response()->json([
            'companies' => $this->chartAccount->companiesNamePaginate($request)
        ]);
    }

    public function search(){

        $request = app()->make('request');
        
            return response()->json([
               'chartAccounts' => $this->chartAccount->where('company_id', $request->companyId)
                                        ->where('name', 'like', '%'.$request->filter . '%')
                                        ->relTable()
                                        ->orderBy('created_at', 'asc')
                                        ->get()
            ]);
    }

   
    
}
