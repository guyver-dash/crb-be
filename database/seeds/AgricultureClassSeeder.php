<?php

use Illuminate\Database\Seeder;
use App\Model\MasterSetup\AgricultureClass;

class AgricultureClassSeeder extends Seeder
{
    
    public function run()
    {
       $agricultureClass = ['SUPERVISED AGRICULTURAL LOAN', 'NON-SUPERVISED AGRICULTURAL LOAN'];

        foreach ($agricultureClass as $value) {
        	
        	AgricultureClass::create([
        			'name' => $value
        		]);
        }
    }
}
