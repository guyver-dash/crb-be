<?php

use Illuminate\Database\Seeder;
use App\Model\City;
use App\Model\Brgy;
use App\Model\Item;
use App\Model\Color;
use App\Model\ItemInfo;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        $citymunCode = City::orderBy('citymunCode')->select(['citymunCode'])->get();
        $brgyCode = Brgy::orderBy('brgyCode')->select(['brgyCode'])->get();
        for ($i=0; $i < 1000; $i++) { 
        	
        	$item = new Item();
            $item->sku = $this->sku($faker->text($maxNbChars = 10));
        	$item->name = $faker->text($maxNbChars = 35);
            $item->amount = $faker->randomFloat($nbMaxDecimals = 2, $min = 50, $max = 99000);
            $item->quantity = rand(1, 100);
            $item->discount = $faker->numberBetween($min = 1, $max = 99);
        	$item->short_desc = $faker->text($maxNbChars = 100);
            $item->status = true;
            $item->save();

            $info = new ItemInfo();
            $info->item_id = $item->id;
            $info->user_id = rand(1, 4);
            $info->unit_id = rand(1, 10);
            $info->store_id = rand(1, 99);
            $info->branch_id = rand(1, 98);
            $info->category_id = rand(1, 8);
            $info->subcategory_id = rand(1, 26);
            $info->further_category_id = rand(1, 99);
            $info->brgyCode = rand(1, 42029);
            $info->citymunCode = rand(1, 1646);
            $info->provCode = rand(1, 87);
            $info->save();

            $newItem = ItemInfo::find($info->id);
             $newItem->colors()->attach($info->id, [
                    'color_id' => rand(1, 11),
                    'item_info_id' => $info->id
                ]);

            

        }
    }

    public function sku($name=false) {
        if ($name) {
            $sku = substr(strtoupper(str_replace(array('a','e','i','o','u'), '', $name)), 0, 6);
        } else {
            $sku = $this->lexicalize(explode(',', 'b,c,d,f,g,h,j,k,l,m,n,p,q,r,s,t,v,w,x,y,z'), 3, 6, 'strtoupper');
        }
        return str_replace(' ', '', $sku) . "-" . rand(100,999);
    }
}
