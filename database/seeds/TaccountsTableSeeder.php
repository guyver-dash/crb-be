<?php

use Illuminate\Database\Seeder;
use App\Model\TAccount;

class TaccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tAccounts = ['Debit', 'Credit', 'DebitorCredit'];

        foreach($tAccounts as $tAccount){
            TAccount::create([
                'name' => $tAccount
            ]);
        }
    }
}
