<?php

use Illuminate\Database\Seeder;
use App\Model\ItemPackage;

class ItemPackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemPackages =  ['Can', 'Bottle', 'Barrel', 'Canister', 'Crate', 'Case','Bag', 'Box', 'Pallet', 'Pack', 'Gallon', 'Sack', 'Kilo', 'Piece', 'Roll', 'Bundle', 'Set'];

        foreach($itemPackages as $itemPackage){
            ItemPackage::create([
                'name' => $itemPackage,
                'desc' => $itemPackage
            ]);
        }
    }
}
