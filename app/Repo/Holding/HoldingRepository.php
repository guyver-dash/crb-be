<?php 

namespace App\Repo\Holding;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Holding;

class HoldingRepository extends BaseRepository implements HoldingInterface{


    public function __construct(){

        $this->modelName = new Holding();
    
    }
}