<?php

use Illuminate\Database\Seeder;
use App\Model\Purchase;
use Carbon\Carbon;

class PurchasesTableSeeder extends Seeder
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
            $purchase = Purchase::create([
                'name' => $faker->sentence($nbWords = 3, $variableNbWords = true),
                'purchasable_id' => $i,
                'purchasable_type' => 'App\Model\Logistic',
                'purchase_no' => rand(6000, 8000),
                'purchase_status_id' => 1, 
                'prepared_by' => $i,
                'order_date' => Carbon::now(),
            ]);

            $purchase->items()->attach($purchase->id,[
                'item_id' => $i,
                'purchase_id' => $purchase->id,
                'qty' => rand(3, 2000),
                'price' => rand(5, 5000)
            ]);
            $purchase->items()->attach($purchase->id,[
                'item_id' => rand(1, 98),
                'purchase_id' => $purchase->id,
                'qty' => rand(3, 2000),
                'price' => rand(5, 5000)
            ]);
            $purchase->items()->attach($purchase->id,[
                'item_id' => rand(1, 98),
                'purchase_id' => $purchase->id,
                'qty' => rand(3, 2000),
                'price' => rand(5, 5000)
            ]);
        }
    }
}
