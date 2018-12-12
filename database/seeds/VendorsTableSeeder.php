<?php

use Illuminate\Database\Seeder;
use App\Model\Vendor;

class VendorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($a=1; $a < 98; $a++) {

            Vendor::create([
                'branch_id' => $a,
                'vendor_id' => $a,
                'name' => $faker->sentence($nbWords = 4, $variableNbWords = true),
                'discount'  => rand(1, 100),
                'capable_supply' => rand(1, 5000)
            ]);

        }
    }
}
