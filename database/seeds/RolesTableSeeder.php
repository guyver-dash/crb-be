<?php

use Illuminate\Database\Seeder;
use App\Model\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = ['Super Admin', 'Super Manager', 'Super Finance Officer', 'Super Auditor', 'Super Inventory', 'Super Cashier', 'Super Validator', 'Super Merchandiser', 'Super Delivery', 'Super CSR', 'Super Staff', 'Store Admin', 'Store CEO', 'Store Area Manager', 'Store Branch Manager', 'Store Cashier', 'Store Validator', 'Store Merchandiser', 'Store Delivery', 'Store Customer', 'Store Beneficiary'
        ];
         
        $level =  1;
        foreach ($roles as $value) {
            $role = Role::create([
                    'name' => $value,
                    'access_level' => $level
                    
                ]);
            $level++;

        }


    }
}
