<?php

use Illuminate\Database\Seeder;
use App\Model\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i < 20; $i++) { 
        	
        	Permission::create([

        			'permissable_id' => rand(1, 97),
        			'permissable_type' => 'App\Model\Holding',
                    'user_id' => rand(1, 2),
                    'role_id' => rand(1, 3),
        			'access_right_id' => rand(1, 5),
                    'is_active' => rand(1, 2)

        		]);
        }
    }
}
