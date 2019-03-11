<?php

use Illuminate\Database\Seeder;
use App\Model\SaleInvoice;
use Carbon\Carbon;

class SaleInvoicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=1; $i < 99; $i++) { 
        
            $saleInvoice = SaleInvoice::create([
                'purchase_id' => rand(1, 882),
                'salable_id' => $i,
                'salable_type' => 'App\Model\Branch',
                'chart_account_id' => rand(1, 633),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
                'date_due' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'token' => $i . str_random(60) 
            ]);

            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);

        }
        for ($i=1; $i < 99; $i++) { 
        
            $saleInvoice = SaleInvoice::create([
                'purchase_id' => rand(1, 882),
                'salable_id' => $i,
                'salable_type' => 'App\Model\Branch',
                'chart_account_id' => rand(1, 633),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
                'date_due' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'token' => $i . str_random(60) 
            ]);

            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);

        }
        for ($i=1; $i < 99; $i++) { 
        
            $saleInvoice = SaleInvoice::create([
                'purchase_id' => rand(1, 882),
                'salable_id' => $i,
                'salable_type' => 'App\Model\Branch',
                'chart_account_id' => rand(1, 633),
                'purchase_status_id' => 1,
                'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                'freight' => rand(1, 20),
                'discount' => rand(1, 100),
                'grand_total' => rand(5, 2000),
                'received_date' => Carbon::now(),
                'received_by' => rand(1, 102),
                'date_due' => $faker->date($format = 'Y-m-d', $max = 'now'),
                'token' => $i . str_random(60) 
            ]);

            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);
            $saleInvoice->products()->attach($saleInvoice->id,[
                'product_id' => rand(1, 294),
                'sale_invoice_id' => $saleInvoice->id,
                'qty' => rand(1, 10),
                'price' => rand(5, 1000),
                'freight' => rand(100, 2000),
                'sub_total' => rand(100, 2000)
            ]);

        }
    }
}
