<?php

use Illuminate\Database\Seeder;
use App\Model\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Stock Item', 'Non-Stock', 'Description Only', 'Services', 'Labor', 'Assembly', 'Activity', 'Charge'];

        $types = ['INGREDIENTS', 'PRODUCT', 'NON-BREAD', 'SUPPLY', 'EQUIPMENT'];
        foreach($categories as $category){

            Category::create([
                    'category_type' => 'App\Model\Branch',
                    'category_id' => rand(1, 2),
                    'name' => $category,
                    'desc' => $category,
                    'parent_id' => 0
                ]);
        }

        foreach($types as $type){

            Category::create([
                'category_type' => 'App\Model\Branch',
                'category_id' => rand(1, 2),
                'name' => $type,
                'desc' => $type,
                'parent_id' => 1
            ]);
        }
        
    }
}
