<?php

use App\Model\BusinessInfo;
use Illuminate\Database\Seeder;

class BusinessInfosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        for ($i = 0; $i < 99; $i++) {

            BusinessInfo::create([

                'businessable_id' => $i,
                'businessable_type' => 'App\Model\Holding', // ,
                'business_type_id' => rand(1, 2),
                'vat_type_id' => rand(1, 2),
                'telephone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'tin' => $faker->phoneNumber,
                'website' => $faker->sentence($nbWords = 6, $variableNbWords = true),

            ]);
        }
        for ($i = 0; $i < 99; $i++) {

            BusinessInfo::create([

                'businessable_id' => $i,
                'businessable_type' => 'App\Model\Company', // ,
                'business_type_id' => rand(1, 2),
                'vat_type_id' => rand(1, 2),
                'telephone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'tin' => $faker->phoneNumber,
                'website' => $faker->sentence($nbWords = 6, $variableNbWords = true),

            ]);
        }

        for ($i = 0; $i < 99; $i++) {

            BusinessInfo::create([

                'businessable_id' => $i,
                'businessable_type' => 'App\Model\Branch', // ,
                'business_type_id' => rand(1, 2),
                'vat_type_id' => rand(1, 2),
                'telephone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'tin' => $faker->phoneNumber,
                'website' => $faker->sentence($nbWords = 6, $variableNbWords = true),

            ]);
        }

        
        for ($i = 0; $i < 99; $i++) {

            BusinessInfo::create([

                'businessable_id' => $i,
                'businessable_type' => 'App\Model\Franchisee', // ,
                'business_type_id' => rand(1, 2),
                'vat_type_id' => rand(1, 2),
                'telephone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'tin' => $faker->phoneNumber,
                'website' => $faker->sentence($nbWords = 6, $variableNbWords = true),

            ]);
        }

        for ($i = 1; $i < 99; $i++) {

            BusinessInfo::create([

                'businessable_id' => $i,
                'businessable_type' => 'App\Model\Logistic', // ,
                'business_type_id' => rand(1, 2),
                'vat_type_id' => rand(1, 2),
                'telephone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'tin' => $faker->phoneNumber,
                'website' => $faker->sentence($nbWords = 6, $variableNbWords = true),

            ]);
        }

        for ($i = 1; $i < 99; $i++) {

            BusinessInfo::create([

                'businessable_id' => $i,
                'businessable_type' => 'App\Model\Commissary', // ,
                'business_type_id' => rand(1, 2),
                'vat_type_id' => rand(1, 2),
                'telephone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'tin' => $faker->phoneNumber,
                'website' => $faker->sentence($nbWords = 6, $variableNbWords = true),

            ]);
        }

        for ($i = 1; $i < 99; $i++) {

            BusinessInfo::create([

                'businessable_id' => $i,
                'businessable_type' => 'App\Model\OtherVendor', // ,
                'business_type_id' => rand(1, 2),
                'vat_type_id' => rand(1, 2),
                'telephone' => $faker->phoneNumber,
                'email' => $faker->safeEmail,
                'tin' => $faker->phoneNumber,
                'website' => $faker->sentence($nbWords = 6, $variableNbWords = true),

            ]);
        }
    }
}
