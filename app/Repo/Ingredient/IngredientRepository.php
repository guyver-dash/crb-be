<?php 

namespace App\Repo\Ingredient;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;
use App\Model\Ingredient;
class IngredientRepository extends BaseRepository implements IngredientInterface{

    public function __construct(){

        $this->modelName = new Ingredient();
    
    }

    public function showEdit($request){

        return $this->modelName->where('id', $request->id)
                                ->relTable()
                                ->first();
    }

}