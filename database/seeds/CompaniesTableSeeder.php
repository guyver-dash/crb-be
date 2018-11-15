<?php

use Illuminate\Database\Seeder;
use App\Model\Company;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	$faker = Faker\Factory::create();
        for ($i=1; $i < 98; $i++) { 
        	$Company = new Company();
            $Company->holding_id = $i;
        	$Company->name = $faker->company;
        	$Company->desc = $faker->sentence($nbWords = 6, $variableNbWords = true);
        	$Company->save();
        }
    }
}
