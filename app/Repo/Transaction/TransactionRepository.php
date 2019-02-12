<?php

namespace App\Repo\Transaction;

use App\Model\Purchase;
use App\Model\PurchaseReceived;
use App\Model\Transaction;
use App\Repo\BaseRepository;
use App\Model\Payee;
use Auth;

class TransactionRepository extends BaseRepository implements TransactionInterface
{

    public function __construct()
    {

        $this->modelName = new Transaction();

    }

    public function payeeFillable($array)
    {
        $payee = new Payee();
        return collect($array)->filter(function ($value, $key) use ($payee) {
            return in_array($key, $payee->getFillable());
        })->toArray();
    }

    public function create($request)
    {

        $reqTrans = $request->transaction;
        $reqTrans['refnum'] = str_replace('0.', '', microtime() . uniqid(true));
        $reqTrans['created_by'] = Auth::User()->id;
        $transaction = $this->modelName->create($reqTrans);

        $this->find($transaction->id)->payee()->create($this->payeeFillable( $request->payee) );

        foreach ($request->invoices as $invoice) {
            unset($invoice['id']);
            $this->find($transaction->id)->purchaseReceived()->attach($transaction->id, $invoice);
        }
        foreach ($request->additionalItems as $item){
            unset($item['id']);
            $this->find($transaction->id)->items()->attach($transaction->id, $item);
        }
    }

    public function transactable($modelType, $id)
    {

        return $modelType::where('id', $id)
            ->whereHas('accessRights.roles.users', function ($q) {
                // $q->where('users.id', Auth::User()->id);
            })
            ->relTable()
            ->first()
            ->transactions;

    }

    public function items($modelType, $id)
    {
        return $modelType::where('id', $id)
            ->whereHas('accessRights.roles.users', function ($q) {
                // $q->where('users.id', Auth::User()->id);
            })
            ->relTable()
            ->first()
            ->items;
    }

    public function purchase($id)
    {

        return Purchase::where('id', $id)
        // ->whereHas('accessRights.roles.users', function($q){
        //     $q->where('users.id', Auth::User()->id);
        // })
            ->relTable()
            ->first();

    }

    public function purchaseReceived($modelType, $id)
    {
        return $modelType::where('id', $id)
            ->whereHas('accessRights.roles.users', function ($q) {
                // $q->where('users.id', Auth::User()->id);
            })
            ->with(['purchaseReceived.items.branches', 'purchaseReceived.items.logistics', 'purchaseReceived.items.commissaries', 'purchaseReceived.items.otherVendors'])
            ->first()
            ->purchaseReceived;
    }
    public function userEntities($modelType)
    {

        return $modelType::whereHas('accessRights.roles.users', function ($q) {
            // $q->where('users.id', Auth::User()->id);
        })
            ->get();

    }

    public function entity($modelType, $id)
    {

        return $modelType::where('id', $id)->with(['address.brgy', 'address.city', 'address.province', 'address.country'])->first();

    }

    public function chartAccounts($modelType, $id)
    {

        return $modelType::where('id', $id)->with('company.chartAccounts')->first()->company->chartAccounts;
    }

    public function transactionTypes($modelType, $modelId)
    {

        return $modelType::where('id', $modelId)->first()->businessInfo->accountingMethod->transactionTypes;
    }

    public function updateGeneralLedgers($request)
    {

        $transaction = $this->find($request->id);
        foreach ($request->generalLedgers as $gl) {

            if (is_null($gl['id'])) {
                $transaction->generalLedgers()->create([
                    'ledgerable_id' => $request->transaction['transactable_id'],
                    'ledgerable_type' => $request->transaction['transactable_type'],
                    'particulars' => $gl['particulars'],
                    'chart_account_id' => $gl['chart_account_id'],
                    'credit_amount' => $gl['credit_amount'],
                    'debit_amount' => $gl['debit_amount'],
                    'tax' => $gl['tax'],
                ]);
            } else {
                $transaction->generalLedgers()->where('id', $gl['id'])->update([
                    'particulars' => $gl['particulars'],
                    'chart_account_id' => $gl['chart_account_id'],
                    'credit_amount' => $gl['credit_amount'],
                    'debit_amount' => $gl['debit_amount'],
                    'tax' => $gl['tax'],
                ]);
            }

        }
    }

    public function payee($transactionId)
    {

        $trans = $this->modelName->where('id', $transactionId)->first();
        if ($trans->payee !== null) {
            return $trans->payee->payable;
        }

        return null;
    }

    public function editPurchaseReceived($purchaseId)
    {

        return PurchaseReceived::where('id', $purchaseId)->with('items')->first();
    }

}
