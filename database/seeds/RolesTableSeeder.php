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
        $roles = ['Super Admin'];
        $roles2 = ['Super Manager', 'Super Finance Officer', 'Super Auditor', 'Super Inventory', 'Super Cashier', 'Super Validator', 'Super Merchandiser', 'Super Delivery', 'Super CSR', 'Super Staff'];
        $roles3 = ['Holding CEO',  'Holding Admin', 'Holding Manager', 'Holding Finance Office', 'Holding Auditor','Holding Inventory'];
        $faker = Faker\Factory::create();
        foreach ($roles as $value) {
            $role = Role::create([
                    'name' => $value,
                    'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'parent_id' => 0,
                    
                ]);
        }
        foreach ($roles2 as $value) {
            $role = Role::create([
                    'name' => $value,
                    'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'parent_id' => 1,
                    
                ]);
        }
        foreach ($roles3 as $value) {
            $role = Role::create([
                    'name' => $value,
                    'description' => $faker->sentence($nbWords = 6, $variableNbWords = true),
                    'parent_id' => 2,
                    
                ]);
        }
    }
}
