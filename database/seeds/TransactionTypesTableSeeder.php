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
        $faker = Faker\Factory::create();
        for ($x=1; $x < 99; $x++) { 
            for ($i=1; $i < 99; $i++) { 
                TransactionType::create([
                    'name' =>  $faker->sentence($nbWords = 3, $variableNbWords = true),
                    'desc' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'company_id' => $i,
                    'chart_account_id' => rand(1, 630)
                ]);
            }
        }
    }
}
