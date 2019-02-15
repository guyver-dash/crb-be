<?php

use Illuminate\Database\Seeder;
use App\Model\SaleOrder;
use Carbon\Carbon;

class SaleOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i < 99; $i++) { 
        
            SaleOrder::create([
                   'purchase_id' => rand(1, 882),
                   'salable_id' => $i,
                   'salable_type' => 'App\Model\Branch',
                   'invoice_no' => str_replace('0.', '', microtime() . uniqid(true)),
                   'ship_date' =>  Carbon::now(),
                   'freight' => rand(1, 5000),
                   'sub_total' => rand(1, 5000),
                   'grand_total' => rand(1, 5000),
                   'discount' => rand(1, 5000),
                   'vat_amount' => rand(1, 5000),
                   'created_by_id' => rand(1, 102)
            ]);

        }
    }
}
