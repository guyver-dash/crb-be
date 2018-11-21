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
        
        $accessRights = ['index', 'create', 'read', 'store', 'edit', 'update'];

        foreach ($accessRights as $value) {
        	
        	$accessRight = AccessRight::create([
        			'name' => $value
        		]);

            $accessRight = AccessRight::find($accessRight->id);
            $accessRight->roles()->attach($accessRight->id, [

                    'role_id' => rand(1, 2),
                    'access_right_id' => $accessRight->id

                ]);

            
        }

        for ($i=1; $i < 50; $i++) { 
                
            $accessRight = AccessRight::find(rand(1, 5));
            $accessRight->menus()->attach($accessRight->id, [
                'menu_id' => rand(1, 31),
                'access_right_id' => $accessRight->id
            ]);
        }
    }
}
