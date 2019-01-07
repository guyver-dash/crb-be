<?php

use Illuminate\Database\Seeder;
use App\Model\ChartCategory;

class ChartCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $categories = ['Assets', 'Liabilities', 'Capital/Equities', 'Incomes', 'Expenses'];
        $faker = Faker\Factory::create();

        for ($i=1; $i < 5; $i++) { 
            
            ChartCategory::create([
                'company_id' => $i,
                'parent_id' => 0,
                'name' => $categories[$i],
                'account_code' => $i . '0',
                'account_display' => $i . '0' . '-' . rand(1, 99) . '-' . rand(1, 99) . '-' . rand(1, 99),
                'accounting_standard_id' => rand(1, 2)
            ]);
        	
        }
        
        for ($i=1; $i < 98; $i++) { 
            
            ChartCategory::create([
                'company_id' => $i,
                'parent_id' => 1,
                'name' => 'Assets-' . $i,
                'account_code' => rand(1, 99),
                'account_display' => 10 . '-' . rand(1, 99) . '-' . rand(1, 99) . '-' . rand(1, 99),
                'accounting_standard_id' => rand(1, 2)
            ]);
        	
        }

        for ($i=1; $i < 99; $i++) { 
            
            ChartCategory::create([
                'company_id' => $i,
                'parent_id' => 2,
                'name' => 'Liabilities' . '-'. $i,
                'account_code' =>rand(1, 99),
                'account_display' => 20 . '-' . rand(1, 99) . '-' . rand(1, 99) . '-' . rand(1, 99),
                'accounting_standard_id' => rand(1, 2)
            ]);
        	
        }

        for ($i=1; $i < 99; $i++) { 
            
            ChartCategory::create([
                'company_id' => $i,
                'parent_id' => 3,
                'name' => 'Capital/Equities' . '-'. $i,
                'account_code' =>rand(1, 99),
                'account_display' => 30 . '-' . rand(1, 99) . '-' . rand(1, 99) . '-' . rand(1, 99),
                'accounting_standard_id' => rand(1, 2)
            ]);
        	
        }
        for ($i=1; $i < 99; $i++) { 
            
            ChartCategory::create([
                'company_id' => $i,
                'parent_id' => 3,
                'name' => 'Incomes' . '-'. $i,
                'account_code' =>rand(1, 99),
                'account_display' => 40 . '-' . rand(1, 99) . '-' . rand(1, 99) . '-' . rand(1, 99),
                'accounting_standard_id' => rand(1, 2)
            ]);
        	
        }

        for ($i=1; $i < 99; $i++) { 
            
            ChartCategory::create([
                'company_id' => $i,
                'parent_id' => 3,
                'name' => 'Expenses' . '-'. $i,
                'account_code' =>rand(1, 99),
                'account_display' => 50 . '-' . rand(1, 99) . '-' . rand(1, 99) . '-' . rand(1, 99),
                'accounting_standard_id' => rand(1, 2)
            ]);
        	
        }
    }
}
