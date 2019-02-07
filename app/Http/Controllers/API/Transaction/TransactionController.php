<?php

namespace App\Http\Controllers\API\Transaction;

use App\Http\Controllers\Controller;
use App\Model\Transaction;
use App\Repo\Transaction\TransactionInterface;
use Auth;
use Illuminate\Http\Request;

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
                $this->transaction->transactable($request->modelType, $request->id)
            ),
            'entity' => $this->transaction->entity($request->modelType, $request->id)->first(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        return response()->json([
            'chartAccounts' => $this->transaction->chartAccounts($request->modelType, $request->modelId),
            'transactionTypes' => $this->transaction->transactionTypes($request->modelType, $request->modelId),
            'createdBy' => Auth::User(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reqTrans = $request->transaction;
        $reqTrans['refnum'] = str_replace('0.', '', microtime() . uniqid(true));
        $reqTrans['created_by'] = Auth::User()->id;
        $transaction = $this->transaction->create($reqTrans);

        $this->transaction->find($transaction->id)->payee()->create([
            'transaction_id' => $transaction->id,
            'payable_id' => $request->payee['payable_id'],
            'payable_type' => $request->payee['payable_type'],
        ]);
        foreach ($request->invoices as $invoice) {
            unset($invoice['id']);
            $this->transaction->find($transaction->id)->purchaseReceived()->attach($transaction->id, $invoice);
        }
        foreach ($request->additionalItems as $item){
            unset($item['id']);
            
            $this->transaction->find($transaction->id)->items()->attach($transaction->id, $item);
        }
        return response()->json([
            'success' => true,
        ]);
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
            'transaction' => $transaction
            // 'payee' => $this->transaction->payee($transaction->id),
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
        $this->transaction->find($request->id)->update($request->transaction);
        $this->transaction->updateGeneralLedgers($request);

        return response()->json([
            'generalLedgers' => $request->generalLedgers,
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

    public function entities(Request $request)
    {

        return response()->json([
            'userEntities' => $this->transaction->userEntities($request->modelType),
        ]);
    }

    public function chartAccounts(Request $request)
    {

        return response()->json([
            'chartAccounts' => $this->transaction->chartAccounts($request->modelType, $request->modelId),
        ]);
    }

    public function purchaseReceived(Request $request)
    {

        return response()->json([
            'purchaseReceived' => $this->transaction->purchaseReceived($request->modelType, $request->modelId),
            'entityItems' => $this->transaction->items($request->modelType, $request->modelId),
            'entity' => $this->transaction->entity($request->modelType, $request->modelId),
        ]);
    }

    public function purchase(Request $request)
    {

        return response()->json([
            'purchase' => $this->transaction->purchase($request->purchaseId),
        ]);
    }
}
