<?php

namespace App\Http\Controllers\API\Transaction;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repo\Transaction\TransactionInterface;
class SaleInvoiceTransactionController extends Controller
{

    protected $transaction;

    public function __construct(TransactionInterface $transaction){
        $this->transaction = $transaction;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = app()->make('request');
        return response()->json([
            'saleInvoices' => $this->transaction->saleInvoices($request->modelType, $request->modelId)->saleInvoices
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
        return $this->transaction->createSaleInvoice($request);
        // return response()->json([
        //     'success' => true
        // ]);
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
    public function edit(Request $request)
    {
        $transaction = $this->transaction->where('id', $request->id)
                        ->with(['productTransaction', 'saleInvoices', 'payor'])->first();
        $payor = $this->transaction->payor($transaction->id);
        return response()->json([
            'transaction' => $transaction,
            'userEntities' => $this->transaction->userEntities($request->modelType),
            // 'products' => $this->transaction->items($payee->entity, $payor->id),
            // 'taxTypes' => $this->transaction->taxTypes(),
            'jobs' => $this->transaction->jobs($request->modelType, $request->modelId)
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
        
        $this->transaction->update($request);
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
    public function destroy($id)
    {
        //
    }
}
