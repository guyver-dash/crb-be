<?php

use Illuminate\Database\Seeder;
use App\Model\AccessRight;
use App\Model\Company;
use App\Model\Holding;
use App\Model\Menu;
use App\Model\Branch;
use App\Model\Trademark;
use App\Model\Franchisee;

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
                
                $menu = Menu::find($a);
                $accessRight = AccessRight::find($i);
                $accessRight->menus()->attach([$a]);
            }

        }

        for($a=1; $a < 98; $a++) {

            for ($i=1; $i < 5; $i++) { 
                
                $company = Holding::find($a);
                $accessRight = AccessRight::find($i);
                $accessRight->holdings()->attach([$a]);
            }

        }
        
       

        for($a=1; $a < 98; $a++) {

            for ($i=1; $i < 5; $i++) { 
                    
                    $company = Company::find($a);
                    $accessRight = AccessRight::find($i);
                    $accessRight->companies()->attach([$a]);
               
            }

        }

        for($a=1; $a < 98; $a++) {

            for ($i=1; $i < 5; $i++) { 
                
                $branch = Branch::find($a);
                $accessRight = AccessRight::find($i);
                $accessRight->branches()->attach([$a]);
            }

        }

        for($a=1; $a < 98; $a++) {

            for ($i=1; $i < 5; $i++) { 
                
                $trademark = Trademark::find($a);
                $accessRight = AccessRight::find($i);
                $accessRight->trademarks()->attach([$a]);
            }

        }

        for($a=1; $a < 98; $a++) {

            for ($i=1; $i < 5; $i++) { 
                
                $trademark = Franchisee::find($a);
                $accessRight = AccessRight::find($i);
                $accessRight->franchisees()->attach([$a]);
            }

        }

        
        
    }
}
