<?php

use Illuminate\Database\Seeder;
use App\Model\Ingredient;

class IngredientsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $names = [
            'cheese bread',
            'pande coco',
            'ensaymada',
            'pandesal',
            'pan pan',
            'francis',
            'cheese cake',
            'cup and cheese',
            'nata de pan',
            'malunggay bread'
        ];

        for($i=1; $i < 98 ; $i++){

            foreach($names as $name){
               $ingredient = Ingredient::create([
                    'company_id' => $i,
                    'name' => $name,
                    'pcs' => rand(100, 500)
                ]);

                $ingredient = Ingredient::find($ingredient->id);
                $ingredient->items()->attach($ingredient->id, [
                    'ingredient_id' => $ingredient->id,
                    'item_id' => rand(1, 98),
                    'qty' => rand(5, 200)
                ]);
            }
        }
        

    }
}
