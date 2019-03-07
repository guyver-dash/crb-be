<?php

use Illuminate\Database\Seeder;
use App\Model\ChartAccount;

class ChartAccountTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Assets', 'Liabilities', 'Capital/Equities', 'Incomes', 'Expenses'];
        $faker = Faker\Factory::create();
        for ($i=1; $i <= 5; $i++) { 
            
            ChartAccount::create([
                'parent_id' => 0,
                'name' => $categories[$i-1],
                'account_code' => $i . '0',
                'normal_balance_id' => rand(1, 2) ,
                'account_display' => $i . '0',
                'remarks' => $faker->sentence($nbWords = 6, $variableNbWords = true)
            ]);
        	
        }
    }
}
