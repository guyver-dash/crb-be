<?php

namespace App\Model\MasterSetup;

use Illuminate\Database\Eloquent\Model;

class LoanCode extends Model
{
    protected $table = 'loan_codes';
    protected $fillable = [ 'loan_categories_id',
		'amortized',
		'method',
		'loan_plty_rate',
		'loan_pdi_rate',
		'amort_plty_rate',
		'amort_pdi_rate',
		'interest_style',
		'penalty_style',
		'idiv',
		'pdiv',
		'delq',
		'rebate',
		'computation_amount',
		'rdiv',
		'pastdue_penalty_style',
		'pddiv',
		'coaacctcode',
		'coaacctcode2',
		'coaacctcode3',
		'coaacctcode4',
		'coaacctcode5',
		'coaacctcode6',
		'coaacctcode7',
		'coaacctcode8',
		'coaacctcode9',
		'bt_is_uid',
		'vc_finance',
		'bt_past_due',
		'distribution_style',
		'auto_transfer',
		'sub_code',
		'coa_service_charge'
    ];

    public function loanCategory(){
    	return $this->hasOne('App\Model\MasterSetup\LoanCategory', 'id', 'loan_categories_id');
    }
}
