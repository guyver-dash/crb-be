<?php 

namespace App\Repo\Transaction;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Transaction;
use App\Model\TransactionType;
use App\Model\ChartAccount;
class TransactionRepository extends BaseRepository implements TransactionInterface{


    public function __construct(){

        $this->modelName = new Transaction();
    
    }

    public function transactable($modelType, $id){

       return $modelType::where('id', $id)
            ->whereHas('accessRights.roles.users', function($q){
                // $q->where('users.id', Auth::User()->id);
            })
            ->relTable()
            ->first()
            ->transactions;

    }
    public function userEntities($modelType){

       return  $modelType::whereHas('accessRights.roles.users', function($q){
            // $q->where('users.id', Auth::User()->id);
        })
        ->get();
        
    }

    public function entity($modelType, $id){
      
        return $modelType::where('id', $id);
        
    }

    public function transactionType($id){

        return TransactionType::where('id', $id)->relTable()->first();
    }

    public function transactionTypes($modelType, $modelId){

        return $modelType::where('id', $modelId)->first()->company->transactionTypes;
    }

    public function updateGeneralLedgers($request){

        $transaction = $this->find($request->id);
        foreach($request->generalLedgers as $gl){
            
            if( is_null($gl['id'])){
                $transaction->generalLedgers()->create([
                    'ledgerable_id' => $request->transaction['transactable_id'],
                    'ledgerable_type' => $request->transaction['transactable_type'],
                    'particulars' => $gl['particulars'],
                    'chart_account_id' => $gl['chart_account_id'],
                    'credit_amount' => $gl['credit_amount'],
                    'debit_amount' => $gl['debit_amount'],
                    'tax' => $gl['tax']
                ]);
            }else{
                $transaction->generalLedgers()->where('id', $gl['id'])->update([
                    'particulars' => $gl['particulars'],
                    'chart_account_id' => $gl['chart_account_id'],
                    'credit_amount' => $gl['credit_amount'],
                    'debit_amount' => $gl['debit_amount'],
                    'tax' => $gl['tax']
                ]);
            }
            
        }
    }

}