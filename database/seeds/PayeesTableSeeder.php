<?php

use Illuminate\Database\Seeder;
use App\Model\Payee;
class PayeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($a=1; $a < 633; $a++) {

            Payee::create([
                'transaction_id' => $a,
                'payable_id' => rand(1, 99),
                'payable_type' => 'App\Model\Branch'
            ]);
        }
    }
}
