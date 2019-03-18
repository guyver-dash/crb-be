<?php 

namespace App\Repo\AccessRight;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\AccessRight;

class AccessRightRepository extends BaseRepository implements AccessRightInterface{


    public function __construct(){

        $this->modelName = new AccessRight();
    
    }

}