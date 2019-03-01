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
        
        for ($i=1; $i < 99 ; $i++) { 
            Product::create([
                'chart_account_id' => rand(1, 633),
                'productable_id' => $i,
                'productable_type' => 'App\Model\Branch',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
            ]);
        }
        for ($i=1; $i < 99 ; $i++) { 
            Product::create([
                'chart_account_id' => rand(1, 633),
                'productable_id' => $i,
                'productable_type' => 'App\Model\Branch',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
            ]);
        }
        for ($i=1; $i < 99 ; $i++) { 
            Product::create([
                'chart_account_id' => rand(1, 633),
                'productable_id' => $i,
                'productable_type' => 'App\Model\Branch',
                'sku' => strtoupper(substr(md5(mt_rand()), 0, 8)),
                'barcode' => $faker->ean13,
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                'price' => rand(1, 1000),
                'discount' => rand(1, 50),
                'qty' => rand(1, 50),
                'tax_type_id' => rand(1, 3),
                'package_id' => rand(1, 15), 
            ]);
        }
    }
}
