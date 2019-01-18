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

}