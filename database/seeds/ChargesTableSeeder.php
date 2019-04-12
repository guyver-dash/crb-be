<?php

use Illuminate\Database\Seeder;
use App\Model\Loans\Charge;

class ChargesTableSeeder extends Seeder
{

    public function run()
    {
        $charge = array(
            'PROCESSING FEE' => 433,
            'COLLECTION FEE' => 433,
            'DOCUMENTARY STAMP' => 353,
            'INSURANCE PREMIUM' => 383,
            'NOTARIAL FEES' => 317
         );

        foreach ($charge as $details => $coaID) {
            Charge::create([
                'chart_account_id' => $coaID,
                'details' => $details
            ]);
        }
    }
}
