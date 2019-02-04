<?php

<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
use Illuminate\Database\Seeder;
=======
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
use App\Model\PurchaseReceived;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PurchasedReceivedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
        for ($i=1; $i < 99 ; $i++) { 
=======
        for ($i = 1; $i < 99; $i++) {
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived = PurchaseReceived::create([
                'purchasable_id' => $i,
                'purchasable_type' => 'App\Model\Logistic',
                'purchase_id' => rand(1, 882),
                'chart_account_id' => rand(1, 633),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
                'date_due' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'token' => $i . str_random(60) 
            ]);
            
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
                'token' => $i . str_random(60),
            ]);

            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
        }

<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
        for ($i=1; $i < 99 ; $i++) { 
=======
        for ($i = 1; $i < 99; $i++) {
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived = PurchaseReceived::create([
                'purchasable_id' => $i,
                'purchasable_type' => 'App\Model\Branch',
                'purchase_id' => rand(1, 882),
                'chart_account_id' => rand(1, 633),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
                'date_due' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'token' => $i . str_random(60) 
            ]);
            
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
                'token' => $i . str_random(60),
            ]);

            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
        }

<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
        for ($i=1; $i < 99 ; $i++) { 
=======
        for ($i = 1; $i < 99; $i++) {
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived = PurchaseReceived::create([
                'purchasable_id' => $i,
                'purchasable_type' => 'App\Model\Commissary',
                'purchase_id' => rand(1, 882),
                'chart_account_id' => rand(1, 633),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
                'date_due' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'token' => $i . str_random(60) 
            ]);
            
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
                'token' => $i . str_random(60),
            ]);

            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
<<<<<<< HEAD:database/seeds/PurchasedReceivedTableSeeder.php
            $purchaseReceived->items()->attach($purchaseReceived->id,[
=======
            $purchaseReceived->items()->attach($purchaseReceived->id, [
>>>>>>> 9c9e82789c8429b36cd293e9d2c5d423280aee5c:database/seeds/PurchasedReceivedTableSeeder.php
                'item_id' => rand(1, 1568),
                'purchase_received_id' => $purchaseReceived->id,
                'qty' => rand(1, 50),
                'price' => rand(5, 5000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000),
            ]);
        }
    }
}
