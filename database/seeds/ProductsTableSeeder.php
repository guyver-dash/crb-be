<?php

use Illuminate\Database\Seeder;
use App\Model\Product;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=1; $i < 1000 ; $i++) { 
           $product = Product::create([
               'category_id' => rand(1, 13),
                'chart_account_id' => rand(1, 5),
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 10),
                'tax_type_id' => rand(1, 3),
            ]);

            $product = Product::find($product->id);
            $product->images()->create([
                'path' => 'images/uploads/' . rand(1,37) . '.jpg',
                'is_primary' => 1,
                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true)
            ]);
            $product->images()->create([
                'path' => 'images/uploads/' . rand(1,37) . '.jpg',
                'is_primary' => 0,
                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true)
            ]);
            $product->images()->create([
                'path' => 'images/uploads/' . rand(1,37) . '.jpg',
                'is_primary' => 0,
                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true)
            ]);
            $product->images()->create([
                'path' => 'images/uploads/' . rand(1,37) . '.jpg',
                'is_primary' => 0,
                'name' => $faker->sentence($nbWords = 2, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true)
            ]);
        }
    }
}
