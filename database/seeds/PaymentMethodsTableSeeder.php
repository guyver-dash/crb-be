<?php

use Illuminate\Database\Seeder;
use App\Model\PaymentMethod;

class PaymentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $paymentMethods = ['Cash', 'Cheque', 'Credit card', 'Debit card'];

        foreach($paymentMethods as $p){
            PaymentMethod::create([
                'name' => $p
            ]);
        }
    }
}
