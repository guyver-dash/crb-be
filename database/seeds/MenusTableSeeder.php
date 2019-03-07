<?php

use Illuminate\Database\Seeder;
use App\Model\Menu;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = ['System Settings', 'Inventories', 'Productions', 'Accounting', 'Breeds', 'Purchases Modules', 'Sales',  'General Ledgers', 'Payroll', 'CRM', 'HRIS', 'Reports'];
        $sub_menu1 = [
            'Users', 'Roles', 'Access Rights', 'Menus', 'Holdings', 'Companies', 'Branches', 'Trademarks', 'Franchisees', 'Logistics', 'Commissaries',  'Company Statutory Table', 'Payroll Setup', 'Customers','Sales Representative', 'Tax Codes', 'Taxes Authoritie', 'Vendor', 'Inventory Items', 'Employees', 'Chart of Accounts', 'Item Prices', 'Employee Billing Rates', 'Sub-Contractor', 'Jobs', 'KYC', 'User Type'];
        
        $sub_menu2 =[
           'Other Vendors', 'Packages', 'Categories', 'Items', 'Purchase Request'
        ];

        $sub_menu3 =[
            'Ingredients', 'Production Boards', 'Scalers', 'Mixers and Molders', 'Proofing', 'Ovens'
         ];
        
         $sub_menu4 =[
            'Accounting Standards', 'Chart of Accounts', 'Transactions', 'General Ledgers'
         ];

         $sub_menu5 =[
            'Disbursement Journal', 'Vendors Credit Memo', 'Sales Journal', 'Sales Credit Memo', 'General Ledgers'
         ];

        foreach ($menus as $value) {
        	
        	     Menu::create([
                    'parent_id' => 0,
        			'path' => str_slug($value, '-'),
        			'name' => $value
        		]);

        }

        foreach($sub_menu1 as $submenu){
            Menu::create([
                'parent_id' => 1,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu
            ]);
        }

        foreach($sub_menu2 as $submenu){
            Menu::create([
                'parent_id' => 2,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu
            ]);
        }

        foreach($sub_menu3 as $submenu){
            Menu::create([
                'parent_id' => 3,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu
            ]);
        }

        foreach($sub_menu4 as $submenu){
            Menu::create([
                'parent_id' => 4,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu
            ]);
        }

        foreach($sub_menu5 as $submenu){
            Menu::create([
                'parent_id' => 53,
                'path' => 'transactions/'.str_slug($submenu, '-'),
                'name' => $submenu
            ]);
        }

    }
}
