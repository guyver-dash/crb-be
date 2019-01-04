<?php 

namespace App\Repo\Ingredient;

use App\Repo\BaseRepository;
use App\Repo\BaseInterface;

class IngredientItemsRepository extends IngredientRepository implements IngredientInterface{


    public function ingredientItems($request){

        return $this->where('id', $request->id)->relTable()->first()->items;
    }
}