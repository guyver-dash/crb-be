<?php 

namespace App\Repo\Product;

use App\Repo\BaseInterface;
use App\Repo\BaseRepository;
use App\Model\Product;

class ProductRepository extends BaseRepository  implements ProductInterface{

    public function __construct(){

        $this->modelName = new Product();
    
    }

}