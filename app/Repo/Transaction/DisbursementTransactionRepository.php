<?php 

namespace App\Repo\Transaction;

use App\Repo\BaseInterface;
use App\Model\Transaction;

class DisbursementTransactionRepository extends TransactionRepository implements TransactionInterface{


    public function update($request){
        $transaction = $this->where('id', $request->id)->first();
        $transaction->update($this->fillable($request->transaction));
        $transaction->itemTransaction()->delete();
        $transaction->purchaseReceived()->detach();

        foreach ($request->invoices as $invoice) {
            unset($invoice['id']);
            $this->find($transaction->id)->purchaseReceived()->attach($transaction->id, $invoice);
        }
        foreach ($request->additionalItems as $item){
            unset($item['id']);
            $this->find($transaction->id)->itemTransaction()->create($item);
        }
    }

}