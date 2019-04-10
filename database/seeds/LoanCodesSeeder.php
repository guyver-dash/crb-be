<?php

use Illuminate\Database\Seeder;
use App\Model\MasterSetup\LoanCode;
use App\Model\MasterSetup\LoanCategory;



class LoanCodesSeeder extends Seeder
{   
    public function run()
    {
        $loanCodes = ['KAPIT BISIG LOAN - MICROFINANCE LOAN', 'MAP - PSM LOANS  MICROFINANCE LOAN', 'MICRO NEGOSYO LOAN'];

        foreach ($loanCodes as $data) {

        	$loanCategory = LoanCategory::create([
	                'parent_id' => 7,
	                'description' => $data
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '7',
					'coa_service_charge' => 40052000
	        ]);        	     
        }

        $loanCodes = ['INDUSTRIAL LOAN - REGULAR LOAN'];

        foreach ($loanCodes as $data) {

        	$loanCategory = LoanCategory::create([
	                'parent_id' => 8,
	                'description' => $data
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '8',
					'coa_service_charge' => 40052000
	        ]);        	     
        }
        //---
        $loanCodes = ['COMMERCIAL LOAN - REGULAR LOAN', 'INSTITUTIONAL FINANCING PROGRAM', 'BACK TO BACK LOAN'];

        foreach ($loanCodes as $data) {

        	$loanCategory = LoanCategory::create([
	                'parent_id' => 9,
	                'description' => $data
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '9',
					'coa_service_charge' => 40052000
	        ]);        	     
        }
        //--       

        	$loanCategory = LoanCategory::create([
	                'parent_id' => 10,
	                'description' => 'MICRO SME LOAN - REGULAR LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '10',
					'coa_service_charge' => 40052000
	        ]);        	     
      
        //--
        	$loanCategory = LoanCategory::create([
	                'parent_id' => 11,
	                'description' => 'OTHER AGRICULTURAL CREDIT LOAN - REGULAR LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '11',
					'coa_service_charge' => 40052000
	        ]); 
	        //---
	        $loanCategory = LoanCategory::create([
	                'parent_id' => 12,
	                'description' => 'AGRARIAN REFORM LOAN PD717 - REGULAR LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '12',
					'coa_service_charge' => 40052000
	        ]); 
	        //--
	        $loanCategory = LoanCategory::create([
	                'parent_id' => 13,
	                'description' => 'MULTI-PURPOSE LOAN - TIME LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '13',
					'coa_service_charge' => 40052000
	        ]); 
	        //==
	        $loanCategory = LoanCategory::create([
	                'parent_id' => 14,
	                'description' => 'DEP-ED REGULAR LOAN - SALARY LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '14',
					'coa_service_charge' => 40052000
	        ]); 
	        //--
	        $loanCategory = LoanCategory::create([
	                'parent_id' => 15,
	                'description' => 'NON DEP-ED CLGU/GOV & PRIVATE EMP. - SALARY LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '15',
					'coa_service_charge' => 40052000
	        ]); 
	        //--
	        $loanCategory = LoanCategory::create([
	                'parent_id' => 16,
	                'description' => 'CBC EMPLOYEES LOAN - SALARY LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '16',
					'coa_service_charge' => 40052000
	        ]);
	        //--
	        $loanCategory = LoanCategory::create([
	                'parent_id' => 17,
	                'description' => 'FRINGE BENEFIT LOAN - SALARY LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '17',
					'coa_service_charge' => 40052000
	        ]);
	        //--
	        $loanCategory = LoanCategory::create([
	                'parent_id' => 18,
	                'description' => 'PENSIONERS LOAN - SALARY LOAN'
	        ]);      

        	LoanCode::create([
	                'loan_categories_id' => $loanCategory->id,
	                'amortized' => 1,
	                'method'  => 'A',
					'loan_plty_rate'  => 0,
					'loan_pdi_rate'  => 0,
					'amort_plty_rate'  => 3,
					'amort_pdi_rate'  => 36,
					'interest_style'  => 'B',
					'penalty_style'  => 'A',
					'idiv'  => 30,
					'pdiv'  => 360,
					'delq'  => NULL,
					'rebate'  => 'A',
					'computation_amount'  => 0,
					'rdiv' => 1,
					'pastdue_penalty_style' => 'C',
					'pddiv' => 360,
					'coaacctcode' => 1,
					'coaacctcode2' => 1,
					'coaacctcode3' => 1,
					'coaacctcode4' => 1,
					'coaacctcode5' => 1,
					'coaacctcode6' => 1,
					'coaacctcode7' => 1,
					'coaacctcode8' => 1,
					'coaacctcode9' => 1,
					'bt_is_uid' => 0,
					'vc_finance' => '001',
					'bt_past_due' => NULL,
					'distribution_style' => NULL,
					'auto_transfer' => NULL,
					'sub_code' => '18',
					'coa_service_charge' => 40052000
	        ]);
	        //--
    }
}
