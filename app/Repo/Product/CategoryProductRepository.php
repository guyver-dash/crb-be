<?php

namespace App\Repo\Product;
use App\Repo\BaseRepository;
use App\Model\Category;
use App\Traits\Obfuscate\Optimuss;
class CategoryProductRepository extends BaseRepository implements ProductInterface
{
    use Optimuss;

    public function __construct(){
            $this->modelName = new Category();
    }
    public function category($id){

        return $this->modelName->find($this->optimus()->encode($id));

    }
}
