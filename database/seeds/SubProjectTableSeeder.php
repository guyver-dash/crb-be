<?php

use Illuminate\Database\Seeder;
use App\Model\MasterSetup\SubProject;

class SubProjectTableSeeder extends Seeder
{
    public function run()
    {
        $desc = [
            'NONE' => 2,
            'RICE/PALAY' => 0,
            'SUGAR' => 0,
            'CORN' => 0,
            'COCONUT/COPRA' => 0,
            'COFFEE' => 0,
            'ABACA & OTH. FIBERS' => 0,
            'TOBACCO' => 0,
            'FRUITS & VEGETABLES' => 0,
            'SORGHUM' => 0,
            'SOYABEANS' => 0,
            'MISCELLANEOUS FEEDGRAINS' => 0,
            'OTHER CROPS' => 0,
            'LIVESTOCK - HOG RAISING' => 1,
            'POULTRY - BROILER/LAYERS' => 1,
            'GOAT' => 1,
            'FISHERY/FISHPOND' => 1,
            'PIGGERY' => 1,
            'CATTLE' => 1,
            'FOREST PRODUCTS' => 1,
            'DUCKS' => 1,
            'FARM IMPLEMENTS/MACHINERY' => 1,
            'OTHERS' => 1,
            'HOLLOW BLOCK MAKING' => 2,
            'SHOP EQUIPMENT' => 2,
            'WAREHOUSE-CDA' => 2,
            'TRANSPORTATION' => 2,
            'TRICYCLE' => 2,
            'RICEMILL' => 2,
            'OTHER INDUSTRIAL' => 2,
            'HOG RAISING' => '',
            'HOG FATTERING' => '',
            'SARI-SARI STORE' => 2,
            'MEAT VENDOR' => 2,
            'FARMING' => 2,
            'FASTFOOD VENDOR' => 2,
            'WATER REFILLING STATION' => '',
            'GAS RETAIL' => 2,
            'FISH VENDOR' => 2,
            'COSMETIC VENDING' => '',
            'DRESSMAKING' => '',
            'E-LOAD' => 2,
            'BAKERY' => '',
            'MANICURE'  => 2,
            'RTW'  => 2,
            'COSMETICS'  => 2,
            'INTERNET CAFE' => '',
            'MEDICINE VENDING' => 2,
            'FEEDS RETAILING' => '',
            'SAND & GRAVEL VENDING' => '',
            'AMBULANT' => '',
            'SEWELRY VENDING' => 2,
            'ICECREAM VENDING' => 2,
            'PARLOR/BARBER SHOP' => '',
            'DIRECT SELLING' => '',
            'BARBEQUE STICK VENDING' => 2,
            'CHARCOAL VENDING' => '',
            'RICE VENDING' => 2,
            'CROPS' => '',
            'MANGO' => 2,
            'ORCHARD' => '',
            'RUBBER' => 2,
            'PURCHASE WORKING ANIMAL' => 1,
            'LIVESTOCK - HOG FATTENING' => 1,
            'OTHERS' => 2
        ];

        foreach ($desc as $details => $agri) {
            SubProject::create([
                'description' => $details,
                'isAgricultural' => $agri
            ]);
        }
    }
}
