<?php

use Illuminate\Database\Seeder;
use App\Model\BankAccount;

class BankAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankNames = ['BDO', 'RCBC', 'China Bank', 'Metro Bank'];

        $faker = Faker\Factory::create();
        for ($i=1; $i < 99; $i++) { 
            BankAccount::create([
                'bank_name' => $bankNames[rand(0, 3)],
                'account_name' => $faker->firstName('male'|'female') . ' ' . $faker->lastName,
                'account_no' => $faker->bankAccountNumber
            ]);
        }
    }
}
