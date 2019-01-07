<?php

use Illuminate\Database\Seeder;
use App\Model\ChartAccount;

class ChartAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=1; $i < 99; $i++) { 
            
            ChartAccount::create([
                'company_id' => $i,
                'name' => 'System Generate' . '-'. $i,
                'chart_category_id' => rand(1, 98)
            ]);
        	
        }
    }
}
