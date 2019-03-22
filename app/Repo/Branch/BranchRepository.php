<?php 

namespace App\Repo\Branch;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Branch;

class BranchRepository extends BaseRepository implements BranchInterface{


    public function __construct(){

        $this->modelName = new Branch();
    
    }

}