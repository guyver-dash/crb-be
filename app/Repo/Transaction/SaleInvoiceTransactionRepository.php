<?php 

namespace App\Repo\Transaction;

use App\Repo\BaseInterface;
use App\Model\Transaction;
use Auth;

class SaleInvoiceTransactionRepository extends TransactionRepository implements TransactionInterface{


    public function createSaleInvoice($request){

        $reqTrans = $request->transaction;
        $reqTrans['refnum'] = str_replace('0.', '', microtime() . uniqid(true));
        $reqTrans['created_by'] = Auth::User()->id;
        $transaction = $this->modelName->create($reqTrans);

        $this->find($transaction->id)->payor()->create($this->payorfillable( $request->payor) );
        foreach ($request->invoices as $invoice) {
            if($invoice['sale_invoice_id'] != ''){
                unset($invoice['id']);
                $this->find($transaction->id)->saleInvoices()->attach($transaction->id, $invoice);
            }
            
        }
        foreach ($request->additionalItems as $item){
            unset($item['id']);
            $this->find($transaction->id)->productTransaction()->create($item);
        }

    }
    public function payor($transId){

        return $this->modelName->where('id', $transId)->first()->payor;
    }

    public function update($request){
        $transaction = $this->where('id', $request->id)->first();
        $transaction->update($this->fillable($request->transaction));
        $transaction->productTransaction()->delete();
        $transaction->saleInvoices()->detach();

        foreach ($request->invoices as $invoice) {
            unset($invoice['id']);
            $this->find($transaction->id)->saleInvoices()->attach($transaction->id, $invoice);
        }
        foreach ($request->additionalItems as $item){
            unset($item['id']);
            $this->find($transaction->id)->productTransaction()->create($item);
        }
    }

}