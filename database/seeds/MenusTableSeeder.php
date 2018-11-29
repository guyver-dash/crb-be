<?php

use Illuminate\Database\Seeder;
use App\Model\Menu;
use App\Model\User;
class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menus = ['System Settings', 'Inventories', 'Productions', 'Breeds', 'Purchases Modules', 'Sales',  'General Ledgers', 'Payroll', 'CRM', 'HRIS', 'Reports'];
        $sub_menu1 = [
            'Users', 'Roles', 'Access Right', 'Menus', 'Holdings', 'Companies', 'Branches', 'Company Statutory Table', 'Payroll Setup', 'Customers','Sales Representative', 'Tax Codes', 'Taxes Authoritie', 'Vendor', 'Inventory Items', 'Employees', 'Chart of Accounts', 'Item Prices', 'Employee Billing Rates', 'Sub-Contractor', 'Jobs', 'KYC', 'User Type'];
        
        $sub_menu2 =[
            'Braches'
        ];
        foreach ($menus as $value) {
        	
        	     Menu::create([
                    'parent_id' => 0,
        			'description' => $value,
        			'name' => $value
        		]);

        }

        foreach($sub_menu1 as $submenu){
            Menu::create([
                'parent_id' => 1,
                'description' => $submenu,
                'name' => $submenu
            ]);
        }

        foreach($sub_menu2 as $submenu){
            Menu::create([
                'parent_id' => 16,
                'description' => $submenu,
                'name' => $submenu
            ]);
        }

    }
}
