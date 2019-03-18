<?php

use App\Model\Menu;
use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $menus = ['Home', 'CIS', 'Deposit', 'Loans', 'Interbranch', 'Miscellaneous', 'General Ledger', 'Reports', 'Setting'];

        $deposits = ['Savings Deposit', 'Time Deposit', 'Share Capital', 'Current Account', 'Special Savings Deposit', 'Special Savings Coop'];
        $savingsDeposit = ['New Account', 'Cash/Memo Transactions', 'Check Deposit', 'Account Ledger', 'Current Account', 'Savings Retagging', 'Post Deposit Payment'];
        $timeDeposits = ['Placement', 'Redemption', 'Time Deposit Ledger'];
        $shareCapital = ['Cbu Transactions'];
        $currentAccount = ['New Account', 'Cash Transactions', 'Check Deposit', 'Account Ledger', 'Check Issuance/Withdrawal'];
        $specialSavingsDeposit = ['New Account', 'Deposit', 'Terminate/Close', 'Account Ledger'];
        $specialSavingsDepositCoop = ['New Account(Old)', 'New Account(New)', 'Cash Transaction'];

        foreach ($menus as $submenu) {
            Menu::create([
                'parent_id' => 0,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        foreach ($deposits as $value) {

            Menu::create([
                'parent_id' => 3,
                'path' => str_slug($value, '-'),
                'name' => $value,
            ]);

        }

        foreach ($savingsDeposit as $value) {

            Menu::create([
                'parent_id' => 10,
                'path' => str_slug($value, '-'),
                'name' => $value,
            ]);

        }

        foreach ($timeDeposits as $value) {

            Menu::create([
                'parent_id' => 11,
                'path' => str_slug($value, '-'),
                'name' => $value,
            ]);

        }

        foreach ($shareCapital as $value) {

            Menu::create([
                'parent_id' => 12,
                'path' => str_slug($value, '-'),
                'name' => $value,
            ]);

        }

        foreach ($currentAccount as $value) {

            Menu::create([
                'parent_id' => 13,
                'path' => str_slug($value, '-'),
                'name' => $value,
            ]);

        }

        foreach ($specialSavingsDeposit as $submenu) {
            Menu::create([
                'parent_id' => 14,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        foreach ($specialSavingsDepositCoop as $submenu) {
            Menu::create([
                'parent_id' => 15,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $loans = ['Loan Application', 'Loan Processing', 'Loan Approval', 'Loan Release', 'Loan Payments', 'Delete Loans', 'Payable Accounts', 'Loan Regrouping', 'List Of Loan Process', 'Upload Loan Payment', 'Post Loan Payment', 'Collection Sheets'];

        foreach ($loans as $submenu) {
            Menu::create([
                'parent_id' => 4,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $loanPayments = ['Loan information', 'Group', 'Individual'];

        foreach ($loanPayments as $submenu) {
            Menu::create([
                'parent_id' => 43,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

    }
}
