<?php

use Illuminate\Database\Seeder;
use App\Model\ItemType;

class ItemTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $itemTypes = [
                'Ingredients', 'Products', 'Non-bread', 'Supplies', 'Equipments'
            ];

        foreach($itemTypes as $itemType){
            ItemType::create([
                'name' => $itemType,
                'desc' => $itemType
            ]);
        }
    }
}
