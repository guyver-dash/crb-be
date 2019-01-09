<?php 

namespace App\Repo\ChartAccount;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\ChartAccount;

class ChartAccountRepository extends BaseRepository implements ChartAccountInterface{


    public function __construct(){

        $this->modelName = new ChartAccount();
    
    }
}