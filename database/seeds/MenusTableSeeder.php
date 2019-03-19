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

        $cis = ['Add Client', 'Add Corporate', 'Edit Profile'];

        foreach ($cis as $submenu) {
            Menu::create([
                'parent_id' => 2,
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

        $savingsDeposit = ['New Account', 'Cash/Memo Transactions', 'Check Deposit', 'Account Ledger', 'Current Account', 'Savings Retagging', 'Post Deposit Payment'];

        foreach ($savingsDeposit as $value) {

            Menu::create([
                'parent_id' => 10,
                'path' => 'cis/add-client/'. str_slug($value, '-'),
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

        $loans = ['Loan Application', 'Loan Processing', 'Loan Approval', 'Loan Release', 'Loan Payments', 'Delete Loans', 'Payable Accounts', 'Loan Regrouping', 'List Of Loan Process', 'Upload Loan Payment', 'Post Loan Payment', 'Collection Sheets', 'List of Loan Approved', 'Microfinance Collection Lists', 'Microfinance Collection List 2'];

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

        $payableAccounts = ['Create Payable Accounts', 'Payables'];

        foreach ($payableAccounts as $submenu) {
            Menu::create([
                'parent_id' => 45,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

       

        $miscellaneous = ['Tellering', 'View Teller Transaction', 'Voucher List', 'Cash Out Approval', 'Other Accounts'];
        foreach ($miscellaneous as $submenu) {
            Menu::create([
                'parent_id' => 6,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $otherAccounts = ['Other Accounts', 'Other Accounts Transaction', 'New/Edit Account', 'Approve New Account', 'Approve New Account-AR'];

        foreach ($otherAccounts as $submenu) {
            Menu::create([
                'parent_id' => 66,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $generalLedger = ['Post Daily Transaction', 'Transaction Posting', 'GL Temp Proofsheet', 'Trial Balance', 'Proofsheet of the Day', 'GL Proofsheet After Posting', 'Voucher List', 'Transaction Approval', 'AP/AR Transaction', 'AP/AR Subsidiary'];

        foreach ($generalLedger as $submenu) {
            Menu::create([
                'parent_id' => 7,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $reports = ['Deposit Report', 'Teller Reports', 'Loans Report', 'Audit Trail Report', 'Share Capital Report', 'General Ledger Report', 'Loan Aging Report', 'Other Reports', 'Other BSP Reports', 'Consolidated Audit Reports'];

        foreach ($reports as $submenu) {
            Menu::create([
                'parent_id' => 8,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $depositReport = ['Daily Reports', 'Periodic Reports', 'Master List', 'Consolidated Sa Reports'];

        foreach ($depositReport as $submenu) {
            Menu::create([
                'parent_id' => 82,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $dailyReports = ['Daily Totals', 'Summary of Account By Product', 'Interest Posting Report', 'Summary of Transaction - Per Tran Type', 'Error Corrected Transactions', 'Summary of Transaction Per Collector', 'Adjustment Report', 'Amic Report', 'Daily Summary Savings Account Transactions'];

        foreach ($dailyReports as $submenu) {
            Menu::create([
                'parent_id' => 92,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $periodicReports = ['Daily Totals', 'Summary of Account By Product', 'Periodic Summary of Account-Per Tran Type', 'Reclassified Dormant Account', 'Td Transactions Reports', 'Dormant to Active', 'Pre-dormancy Notice Report', 'Adjustment Report', 'Summary Deposit Report'];

        foreach ($periodicReports as $submenu) {
            Menu::create([
                'parent_id' => 93,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $settings = ['Setup Time Deposit', 'Setup Loans'];

        foreach ($settings as $submenu) {
            Menu::create([
                'parent_id' => 93,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $setUpTimeDeposit = ['time Deposit Reclassification', 'Time Deposit Limit to Names', 'Time Deposit Override Setup', 'Time Deposit Join Reclassification'];

        $settings = ['Setup Time Deposit', 'Setup Loans'];

        foreach ($settings as $submenu) {
            Menu::create([
                'parent_id' => 9,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

        $setupLoans = ['Add Collector', 'Setup Holidays', 'Add Center', 'Add Barangay', 'Add Groups', 'Loan Category', 'Office Setup', 'Loan Status Reclassification'];

        foreach ($setupLoans as $submenu) {
            Menu::create([
                'parent_id' => 93,
                'path' => str_slug($submenu, '-'),
                'name' => $submenu,
            ]);
        }

    }
}
