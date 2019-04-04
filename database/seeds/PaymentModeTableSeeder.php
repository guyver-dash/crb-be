<?php

use Illuminate\Database\Seeder;
use App\Model\Loans\PaymentMode;

class PaymentModeTableSeeder extends Seeder
{
    public function run()
    {
        $modes = array(
            'Daily' => 1,
            'Weekly' => 7,
            'Quincena' => 15,
            'Quarterly' => 90,
            'Tri-Mestral' => 120,
            'Semi Yearly' => 180,
            'Yearly' => 360
         );

        foreach ($modes as $details => $days) {
            PaymentMode::create([
                'details' => $details,
                'days' => $days
            ]);
        }
    }
}
