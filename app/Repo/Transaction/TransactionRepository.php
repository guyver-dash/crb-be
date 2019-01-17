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

    public function entity($request){
      
        return $request->entity::where('id', $request->id);
        
    }

    public function transactionTypes($companyId){

        return TransactionType::where('company_id', $companyId)->get();
    }

    public function chartAccounts($companyId){

        return ChartAccount::where('company_id', $companyId)
            ->where('parent_id', 0)
            ->relTable()
            ->get();
    }
}