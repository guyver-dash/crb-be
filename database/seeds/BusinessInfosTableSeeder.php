<?php

use Illuminate\Database\Seeder;
use App\Model\BusinessInfo;

class BusinessInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businessType = ['App\Model\Holding', 'App\Model\Company'];
        $faker = Faker\Factory::create();

        for ($i=0; $i < 98; $i++) { 
        	
        	BusinessInfo::create([

        			'businessable_id' => $i, 
        			'businessable_type'=> $businessType[rand(0,1)],
        			'business_type_id' => rand(1,2), 
        			'vat_type_id' => rand(1, 2),
        			'telephone' => $faker->phoneNumber, 
        			'email' => $faker->safeEmail, 
        			'tin' => $faker->phoneNumber, 
        			'website' => $faker->sentence($nbWords = 6, $variableNbWords = true)

        		]);
        }
    }
}
