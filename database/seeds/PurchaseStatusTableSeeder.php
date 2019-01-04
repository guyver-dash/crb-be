<?php

use Illuminate\Database\Seeder;
use App\Model\PurchaseStatus;

class PurchaseStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $purchaseStatus = ['Request', 'Waiting approvals', 'Order', 'For Delivery', 'In transit', 'Received'];

        foreach($purchaseStatus as $status){
            PurchaseStatus::create([
                'name' => $status
            ]);
        }
    }
}
