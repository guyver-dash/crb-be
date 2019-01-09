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

        // $this->authorizeResource(AccountChart::class);
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
        
        $chartAccount = $this->chartAccount->create($request->all());

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
    public function show(Request $request)
    {
        return response()->json([
            'chartAccount' => $this->chartAccount->where('id', $request->id)->first()
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
        //
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

    public function companies(){

        $request = app()->make('request');
        $companies = Company::where('name', 'like', '%'.$request->filter . '%')
                                ->orderBy('created_at', 'asc')
                                ->get();

        return response()->json([
            'companies' => $this->chartAccount->paginate($companies)
        ]);
    }

    public function search(){

        $request = app()->make('request');
        $chartAccounts = $this->chartAccount->where('company_id', $request->companyId)
                                ->where('name', 'like', '%'.$request->filter . '%')
                                ->relTable()
                                ->orderBy('created_at', 'asc')
                                ->get();
        
                                return response()->json([
                                    'chartAccounts' => $chartAccounts
                                ]);
    }

    
}
