<?php

use Illuminate\Database\Seeder;
use App\Model\BusinessType;

class BusinessTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $businessTypes = ['Corporation', 'Sole Proprietorship'];

        foreach ($businessTypes as $value) {
        	
        	BusinessType::create([

        			'name' => $value
        		]);
        }
    }
}
