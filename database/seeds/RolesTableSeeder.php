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
        $roles = ['Super Admin', 'Bod Chairman', 'Vice-President for Finance', 'MF Supervisor', 'Secretary','Treasurer','Loan Monitoring Officer', 'Loan Monitoring Officer', 'Operation Director','New Accounts Clerk','Branch Accountant','Loan Disbursement Officer','Teller','Cashier','Audit Manager','Manager','President','Account Officer','Branch Manager','Credit Officer','Area Manager','General Bookkeeper','IT Supervisor', 'Microfinance Clerk','Loan Processor'];
        $roles2 = ['Super Manager', 'Super Finance Officer', 'Super Auditor', 'Super Inventory', 'Super Cashier', 'Super Validator', 'Super Merchandiser', 'Super Delivery', 'Super CSR', 'Super Staff'];
        $roles3 = ['Holding CEO',  'Holding Admin', 'Holding Manager', 'Holding Finance Office', 'Holding Auditor','Holding Inventory'];
         
        foreach ($roles as $value) {
            $role = Role::create([
                    'name' => $value,
                    'parent_id' => 0,
                    
                ]);

        }

        foreach ($roles2 as $value) {
            $role = Role::create([
                    'name' => $value,
                    'parent_id' => 1,
                    
                ]);

        }

        foreach ($roles3 as $value) {
            $role = Role::create([
                    'name' => $value,
                    'parent_id' => 2,
                    
                ]);

        }


    }
}
