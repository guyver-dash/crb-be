<?php

use Illuminate\Database\Seeder;
use App\Model\GeneralLedger;

class GeneralLedgersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       
        for($a=1; $a < 633; $a++) {

            for($i=1; $i < 10; $i++) {
                GeneralLedger::create([
                    'ledgerable_id' => rand(1, 99),
                    'ledgerable_type' => 'App\Model\Branch',
                    'transaction_id' => $a,
                    'particulars' => 'particulars ' . $a,
                    'chart_account_id' => rand(3, 635),
                    'debit_amount' => rand(500, 40000),
                    'credit_amount' => rand(1, 90000),
                    'tax' => rand(1, 100),
                    'is_posted' => rand(0, 1)
                ]);
            }
        }

        
    }
}
