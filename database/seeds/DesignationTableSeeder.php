<?php

use Illuminate\Database\Seeder;
use App\Model\MasterSetup\Designation;


class DesignationTableSeeder extends Seeder
{

    public function run()
    {
        $desc = ['CHAIRMAN', 'VICE-PRESIDENT/CO', 'SECRETARY', 'TREASURER', 'LOAN MONITORING OFFICER', 'OPERATION DIRECTOR',
                'ACCOUNTING CLERK', 'BRANCH BOOKKEEPER', 'LOAN DISBURSEMENT OFFICER', 'TELLER', 'CASHIER', 'AUDITOR', 'MANAGER',
                'GENERAL MANAGER', 'ACCOUNT OFFICER', 'BRANCH MANAGER', 'LOAN OFFICER', 'AREA MANAGER', 'GENERAL BOOKKEEPER',
                'IT SUPERVISOR', 'MICROFINANCE CLERK', 'LOAN PROCESSOR'
        ];

        foreach ($desc as $details) {
            Designation::create([
                'description' => $details
            ]);
        }
    }
}
