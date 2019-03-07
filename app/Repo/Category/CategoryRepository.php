<?php 

namespace App\Repo\Category;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Category;

class CategoryRepository extends BaseRepository implements CategoryInterface{


    public function __construct(){

        $this->modelName = new Category();
    
    }

}