<?php

use Illuminate\Database\Seeder;
use App\Model\TaxType;

class TaxTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taxTypes = ['VATable Sales', 'VAT-Exempt Sales', 'Zero Rated Sales'];

        foreach($taxTypes as $tt){
            TaxType::create([
                'name' => $tt
            ]);
        }
    }
}
