<?php

use Illuminate\Database\Seeder;
use App\Model\MasterSetup\LoanCategory;

class LoanCategoriesSeeder extends Seeder
{
    
    public function run()
    {
        $loanCategories = ['MICROFINANCE LOANS', 'INDUSTRIAL LOANS', 'COMMERCIAL LOANS','MICRO/SMALL/MEDIUM ENTERPRISE LOANS', 'AGRICULTURAL LOANS', 'OTHER LOANS/SALARY'];

        foreach ($loanCategories as $sub_categories) {

        	if($sub_categories == 'MICROFINANCE LOANS'){
        		LoanCategory::create([
	                'parent_id' => 0,
	                'description' => $sub_categories,
	                'isMicro' => 1,
	                'misAmort' => 1
	            ]);
        	}else{
        		LoanCategory::create([
	                'parent_id' => 0,
	                'description' => $sub_categories,
	                'misAmort' => 3
	            ]);
        	}           
        }

        LoanCategory::create([
	                'parent_id' => 1,
	                'description' => 'MICROFINANCE LOANS'
	            ]);

        LoanCategory::create([
	                'parent_id' => 2,
	                'description' => 'INDUSTRIAL LOANS'
	            ]);

        LoanCategory::create([
	                'parent_id' => 3,
	                'description' => 'COMMERCIAL LOANS'
	            ]);

        LoanCategory::create([
	                'parent_id' => 4,
	                'description' => 'MICRO/SMALL/MEDIUM ENTERPRISE'
	            ]);

        $loanSubCategories = ['OTHER AGRICULTURAL LOANS', 'AGRARIAN REFORM LOANS PD-717'];

        foreach ($loanSubCategories as $sub_categories) {        	
        		LoanCategory::create([
	                'parent_id' => 5,
	                'description' => $sub_categories
	            ]);
        }

        $loanSubCategories = ['MULTIPURPOSE LOAN (MPL)', 'DEP-ED REGULAR LOAN','NON DEP-ED CLGU/GOVT & PRIVATE EMPLOYEES','CBC EMPLOYEES','FRINGE BENEFIT LOANS','PENSIONERS LOAN'];

        foreach ($loanSubCategories as $sub_categories) {        	
        		LoanCategory::create([
	                'parent_id' => 6,
	                'description' => $sub_categories
	            ]);
        }

    }
}
