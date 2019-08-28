<?php

use Illuminate\Database\Seeder;
use App\Model\Loans\LoanStatus;

class LoanStatusTableSeeder extends Seeder
{

    public function run()
    {
        $loans = ['Current', 'Past Due', 'Restructed', 'Litigated', 'Asset Acquired', 'Written Off'];

        foreach ($loans as $loanDetails) {
            LoanStatus::create([
                'details' => $loanDetails
            ]);
        }
    }
}
