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

        $menus = ['System Settings', 'Inventories', 'Productions', 'Chart Of Accounts', 'Breeds', 'Purchases Modules', 'Sales',  'General Ledgers', 'Payroll', 'CRM', 'HRIS', 'Reports'];
        $sub_menu1 = [
            'Users', 'Roles', 'Access Right', 'Menus', 'Holdings', 'Companies', 'Branches', 'Trademarks', 'Franchisees', 'Logistics', 'Commissaries',  'Company Statutory Table', 'Payroll Setup', 'Customers','Sales Representative', 'Tax Codes', 'Taxes Authoritie', 'Vendor', 'Inventory Items', 'Employees', 'Chart of Accounts', 'Item Prices', 'Employee Billing Rates', 'Sub-Contractor', 'Jobs', 'KYC', 'User Type'];
        
        $sub_menu2 =[
           'Other Vendors', 'Packages', 'Categories', 'Items', 'Purchase Request'
        ];

        $sub_menu3 =[
            'Ingredients', 'Production Boards', 'Scalers', 'Mixers and Molders', 'Proofing', 'Ovens'
         ];
        
         $sub_menu4 =[
            'Accounting Standards', 'Chart of Accounts'
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
                'parent_id' => 2,
                'description' => $submenu,
                'name' => $submenu
            ]);
        }

        foreach($sub_menu3 as $submenu){
            Menu::create([
                'parent_id' => 3,
                'description' => $submenu,
                'name' => $submenu
            ]);
        }

        foreach($sub_menu4 as $submenu){
            Menu::create([
                'parent_id' => 4,
                'description' => $submenu,
                'name' => $submenu
            ]);
        }

    }
}
