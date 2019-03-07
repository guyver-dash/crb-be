<?php 

namespace App\Repo\Role;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Role;

class RoleRepository extends BaseRepository implements RoleInterface{


    public function __construct(){

        $this->modelName = new Role();
    
    }

}