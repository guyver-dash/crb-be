<?php

namespace App\Http\Controllers\API\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Transaction\TransactionInterface;
use App\Model\Transaction;

class TransactionController extends Controller
{

    protected $transaction;

    public function __construct(TransactionInterface $transaction)
    {

        // $this->authorizeResource(ChartAccount::class);
        $this->transaction = $transaction;
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        return response()->json([
            'transactions' => $this->transaction->paginate(
                $this->transaction->entity($request)->relTable()->first()->transactions
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
    public function edit(Transaction $transaction, Request $request)
    {
        $transaction = $this->transaction->where('id', $request->id)->relTable()->first();
        
        return response()->json([
            'transaction' => $transaction,
            'transactionTypes' => $this->transaction->transactionTypes($request->modelType, $request->modelId),
            'chartAccounts' => $this->transaction->chartAccounts($request->modelType, $request->modelId),
            'payee' => $this->transaction->payee($transaction->id)
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


    public function transactable(Request $request){

        return response()->json([
            'transactions' => $this->transaction->paginate(
                                    $this->transaction->transactable($request->modelType, $request->id)
                            ),
            'entity' => $this->transaction->entity($request->modelType, $request->id)->first()            
        ]);
    }

    public function entities(Request $request){

        return response()->json([
            'userEntities' => $this->transaction->userEntities($request->modelType)
        ]);
    }
   
}
