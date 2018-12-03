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

        for($a=1; $a < 100; $a++) {

            for ($i=1; $i < 5; $i++) { 
                
                $accessRight = AccessRight::find($i);
                $accessRight->menus()->attach($accessRight->id, [
                    'menu_id' => rand(1, 31),
                    'access_right_id' => $accessRight->id
                ]);
            }

        }

        for($a=1; $a < 98; $a++) {

            for ($i=1; $i < 5; $i++) { 
                
                $accessRight = AccessRight::find($i);
                $accessRight->holdings()->attach($accessRight->id, [
                    'holding_id' => $a,
                    'access_right_id' => $accessRight->id
                ]);
            }

        }

        for($a=1; $a < 98; $a++) {

            for ($i=1; $i < 5; $i++) { 
                
                $accessRight = AccessRight::find($i);
                $accessRight->companies()->attach($accessRight->id, [
                    'company_id' => $a,
                    'access_right_id' => $accessRight->id
                ]);
            }

        }

        for($a=1; $a < 98; $a++) {

            for ($i=1; $i < 5; $i++) { 
                
                $accessRight = AccessRight::find($i);
                $accessRight->branches()->attach($accessRight->id, [
                    'branch_id' => $a,
                    'access_right_id' => $accessRight->id
                ]);
            }

        }

        
        
    }
}
