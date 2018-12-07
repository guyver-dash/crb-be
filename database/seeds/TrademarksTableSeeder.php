<?php

use Illuminate\Database\Seeder;
use App\Model\Trademark;

class TrademarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i=1; $i < 99; $i++) { 
            $trademark = new Trademark();
        	$trademark->name = $faker->sentence($nbWords = 3, $variableNbWords = true);
        	$trademark->desc = $faker->sentence($nbWords = 6, $variableNbWords = true);
        	$trademark->company_id = $i;
        	$trademark->save();
        }
    }
}
