<?php

use Illuminate\Database\Seeder;
use App\Model\Loans\LoanLevel;

class LoanLevelTableSeeder extends Seeder
{
    public function run()
    {
        $loans = ['Applied', 'Processed', 'Approved', 'Released'];

        foreach ($loans as $loanDetails) {
            LoanLevel::create([
                'details' => $loanDetails
            ]);
        }
    }
}
