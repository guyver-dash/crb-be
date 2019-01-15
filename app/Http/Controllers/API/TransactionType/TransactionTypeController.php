<?php

namespace App\Http\Controllers\API\TransactionType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\TransactionType\TransactionTypeInterface;
use App\Model\TransactionType;

class TransactionTypeController extends Controller
{

    protected $transactionType;

    public function __construct(TransactionTypeInterface $transactionType)
    {

        $this->authorizeResource(TransactionType::class);
        $this->transactionType = $transactionType;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return response()->json([
            'transactionTypes' => $this->transactionType->paginate(
                                        $this->transactionType->where('company_id', $request->companyId)
                                            ->where('name', 'like', '%'.$request->filter.'%')
                                            ->relTable()
                                            ->orderBy('created_at', 'desc')
                                            ->get()
                                ),
            'company' => $this->transactionType->where('company_id', $request->companyId)->first()->company
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
        $this->transactionType->create( $request->all() );

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
    public function show(TransactionType $transactionType, Request $request)
    {
        return response()->json([
            'transactionType' => $this->transactionType->where('id', $request->id)->first()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionType $transactionType, Request $request)
    {
        
        return response()->json([
            'transactionType' => $this->transactionType->where('id', $request->id)->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TransactionType $transactionType, Request $request)
    {
        $this->transactionType->find($request->id)->update($request->all());

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
    public function destroy(TransactionType $transactionType, Request $request)
    {
        $this->transactionType->find($request->id)->delete();

        return response()->json([
            'success' => true
        ]);
    }

    public function companies(Request $request){

        return response()->json([
            'companies' => $this->transactionType->companiesNamePaginate($request)
        ]);
    }
}
