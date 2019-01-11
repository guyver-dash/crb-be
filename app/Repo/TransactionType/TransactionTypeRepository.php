<?php 

namespace App\Repo\TransactionType;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\TransactionType;

class TransactionTypeRepository extends BaseRepository implements TransactionTypeInterface{


    public function __construct(){

        $this->modelName = new TransactionType();
    
    }

}