<?php

use Illuminate\Database\Seeder;
use App\Model\AccountingMethod;

class AccountingMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $accountingMethods = [
            'Cash Basis Accounting', 'Acrual Basis Accounting'
        ];

        foreach($accountingMethods as $am){
            AccountingMethod::create([
                'name' => $am
            ]);
        }
    }
}
