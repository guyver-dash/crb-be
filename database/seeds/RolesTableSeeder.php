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
         
        foreach ($roles as $value) {
            
            Role::create([
                    'name' => $value
                    
                ]);
        }
    }
}
