<?php

use Illuminate\Database\Seeder;
use App\Model\MasterSetup\Economic;

class EconomicTableSeeder extends Seeder
{
    public function run()
    {
        $desc = ['NONE' => 0, 'AGRICULTURE/HUNTING/FORESTRY'  => 0,'FISHING'  => 0,
                'MINING AND QUARRYING' => 1,
                'MANUFACTURING' => 1,
                'ELECTRICITY, GAS AND WATER' => 1,
                'CONSTRUCTION' => 1,
                'WHOLESALE/RETAIL/REPAIR/HOUSE' => 1,
                'TRANSPORT/STORAGE/COMMUNICATION' => 1,
                'FINANCIAL INTERMEDIATION' => 1,
                'REAL ESTATE/RENTING/BUSINESS' => 1,
                'PUBLIC ADMIN/SOCIAL SECURITY' => 1,
                'EDUCATION' => 1,
                'HEALTH AND SOCIAL WORK' => 1,
                'OTHR COMM/SOCIAL/PERSONAL ACT' => 1,
                'PRVT HOUSEHOLDS W/ EMPLOYEES' => 1,
                'EXTRA-TERRITORIAL ORGANIZATION' => 1,
                'HOTELS AND RESTAURANTS' => 1];

        foreach ($desc as $details => $agri) {
            Economic::create([
                'description' => $details,
                'isAgricultural' => $agri
            ]);
        }
    }
}
