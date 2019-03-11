<?php

use Illuminate\Database\Seeder;
use App\Model\VatType;

class VatTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $vatTypes = ['Vat', 'Non-Vat'];

        foreach ($vatTypes as $value) {
        	
        	VatType::create([

        			'name' => $value
        		]);
        }
    }
}
