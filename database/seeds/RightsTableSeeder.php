<?php

use Illuminate\Database\Seeder;
use App\Model\Right;

class RightsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $rights = ['view', 'create', 'update', 'delete', 'print'];

        foreach ($rights as $right) {
        	
        	$right  = Right::create([

        			'name' => $right

        		]);

        	
        }
    }
}
