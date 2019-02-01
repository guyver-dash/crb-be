<?php

use Illuminate\Database\Seeder;
use App\Model\PurchaseRecieved;
use Carbon\Carbon;

class PurchasedRecievedTableSeeder extends Seeder
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
            $purchaseRecieved = PurchaseRecieved::create([
                'purchasable_id' => $i,
                'purchasable_type' => 'App\Model\Logistic',
                'purchase_id' => rand(1, 1176),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
                'token' => $i . str_random(60) 
            ]);
            
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
        }

        for ($i=1; $i < 99 ; $i++) { 
            $purchaseRecieved = PurchaseRecieved::create([
                'purchasable_id' => $i,
                'purchasable_type' => 'App\Model\Branch',
                'purchase_id' => rand(1, 1176),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
                'token' => $i . str_random(60) 
            ]);
            
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
        }

        for ($i=1; $i < 99 ; $i++) { 
            $purchaseRecieved = PurchaseRecieved::create([
                'purchasable_id' => $i,
                'purchasable_type' => 'App\Model\Commissary',
                'purchase_id' => rand(1, 1176),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
                'token' => $i . str_random(60) 
            ]);
            
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $purchaseRecieved->items()->attach($purchaseRecieved->id,[
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseRecieved->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
        }
    }
}
