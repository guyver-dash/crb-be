<?php

use Illuminate\Database\Seeder;
use App\Model\TransactionType;

class TransactionTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactionTypes = ['Disbursement Journal', 'Receipt Journal', 'General Journal'];
        $faker = Faker\Factory::create();
        for ($i=1; $i < 99; $i++) { 
            foreach($transactionTypes as $transType){
                TransactionType::create([
                    'company_id' => $i,
                    'name' => $transType,
                    'desc' => $faker->sentence($nbWords = 4, $variableNbWords = true)
                ]);
            }
        }
    }
}
