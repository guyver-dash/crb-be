<?php

use Illuminate\Database\Seeder;
use App\Model\Package;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = ['Can', 'Bottle', 'Barrel', 'Canister', 'Crate', 'Case',
        'Bag', 'Box', 'Pallet', 'Pack', 'Gallon', 'Sack', 'Pieces',
        'Roll', 'Bundle', 'Set'];

        foreach($packages as $package){
            Package::create([
                'name' => $package,
                'desc' => $package
            ]);
        }
    }
}
