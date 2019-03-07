<?php

use Illuminate\Database\Seeder;
use App\Model\NormalBalance;

class NormalBalanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $normalBalance = ['Debit', 'Credit', 'DebitorCredit'];

        foreach($normalBalance as $n){
            NormalBalance::create([
                'name' => $n
            ]);
        }
    }
}
