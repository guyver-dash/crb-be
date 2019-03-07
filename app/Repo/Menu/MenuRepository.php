<?php 

namespace App\Repo\Menu;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Menu;

class MenuRepository extends BaseRepository implements MenuInterface{


    public function __construct(){

        $this->modelName = new Menu();
    
    }

}