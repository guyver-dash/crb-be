<?php 

namespace App\Repo\Transaction;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Transaction;
use App\Model\Branch;

class TransactionRepository extends BaseRepository implements TransactionInterface{


    public function __construct(){

        $this->modelName = new Transaction();
    
    }

    public function findBranch($id){

      return  Branch::where('id', $id)->first();
      
    }

}