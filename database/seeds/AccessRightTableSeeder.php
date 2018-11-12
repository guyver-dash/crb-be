<?php

use Illuminate\Database\Seeder;
use App\Model\AccessRight;

class AccessRightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $accessRights = ['create', 'read', 'store', 'edit', 'update'];

        foreach ($accessRights as $value) {
        	
        	AccessRight::create([
        			'name' => $value
        		]);
        }
    }
}
