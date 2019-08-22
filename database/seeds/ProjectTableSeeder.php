<?php

use Illuminate\Database\Seeder;
use App\Model\MasterSetup\Project;

class ProjectTableSeeder extends Seeder
{
    public function run()
    {
        $desc = [
            'NONE' => 0,
            'CROPS' => 0,
            'AGRICULTURAL PURPOSES' => 1,
            'INDUSTRIAL' => 0,
            'COMMERCIAL PURPOSES' => 0,
            'OTHER PURPOSE' => 1,
            'MICRO/SMALL/MEDIUM ENTERPRISE' => 0,
            'MICROFINANCE' => 0
        ];

        foreach ($desc as $details => $agri) {
            Project::create([
                'description' => $details,
                'isAgricultural' => $agri
            ]);
        }
    }
}
