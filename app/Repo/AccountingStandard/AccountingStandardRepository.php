<?php 

namespace App\Repo\AccountingStandard;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\AccountingStandard;

class AccountingStandardRepository extends BaseRepository implements AccountingStandardInterface{


    public function __construct(){

        $this->modelName = new AccountingStandard();
    
    }
}