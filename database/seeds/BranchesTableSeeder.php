<?php

use Illuminate\Database\Seeder;
use App\Model\Branch;
use App\Model\Store;
use App\Model\Address;
class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = Faker\Factory::create();

        for ($i=1; $i < 97; $i++) { 
        	$branch = new Branch();
        	$branch->name = $faker->company;
        	$branch->desc = $faker->sentence($nbWords = 6, $variableNbWords = true);
        	$branch->company_id = $i;
        	$branch->save();
        }



        
        for ($i=1; $i < 97; $i++) { 
            
            $branch = Branch::find($i);

            $newAddress = new Address();
            $newAddress->street_lot_blk = $faker->streetAddress;
            $newAddress->latitude = $faker->latitude($min = 9, $max = 11); 
            $newAddress->longitude = $faker->longitude($min = 122, $max = 124);
            $newAddress->country_id = 173;
            $newAddress->province_id = rand(1, 88);
            $newAddress->city_id = rand(1, 1647);
            $newAddress->brgy_id = rand(1, 42029);
            $branch->address()->save($newAddress);

        }
    }
}
