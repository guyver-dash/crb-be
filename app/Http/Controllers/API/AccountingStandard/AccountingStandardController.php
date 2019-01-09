<?php

namespace App\Http\Controllers\API\AccountingStandard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\AccountingStandard\AccountingStandardInterface;
use App\Model\AccountingStandard;

class AccountingStandardController extends Controller
{

    protected $accSta;
    
    public function __construct(AccountingStandardInterface $accSta)
    {
        $this->authorizeResource(AccountingStandard::class);
        $this->accSta = $accSta;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return response()->json([

            'accountingStandards' => $this->accSta->paginate(
                $this->accSta
                    ->where('name', 'like', '%'. app()->make('request')->filter . '%')
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
    public function store(Request $request)
    {
        $this->accSta->create( $request->all() );

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
    public function show(AccountingStandard $accountingStandard, Request $request)
    {
        return response()->json([
            'accountingStandard' => $this->accSta->where('id', $request->id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AccountingStandard $accountingStandard, Request $request)
    {
        return response()->json([
            'accountingStandard' => $this->accSta->where('id', $request->id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AccountingStandard $accountingStandard, Request $request)
    {
        $this->accSta->where('id', $request->id)->first()->update( $request->all() );

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
    public function destroy(AccountingStandard $accountingStandard, Request $request)
    {
        $this->accSta->where('id', $request->id)->first()->delete();

        return response()->json([
            'success' => true
        ]);

    }
}
