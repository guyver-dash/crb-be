<?php

namespace App\Http\Controllers\API\Loan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\Loan\AmortService;
use App\Model\Loans\Amortization;
use App\Model\Loans\Balance;
use App\Model\Loans\Loan;
use App\Model\Loans\LoanCharge;
use App\Model\Loans\LoanGroup;
use App\Model\Loans\Ledger;
use App\Model\Loans\TransactionCode;
use App\Model\DailyTransaction;

use Illuminate\Http\Request;

class LoanController extends Controller
{
    private $amortService;
    private $transCode;

    public function __construct(AmortService $amortService, TransactionCode $transCode)
    {
        $this->amortService = $amortService;
        $this->transCode = $transCode;
    }

    public function store(Request $request)
    {
        $request['cycle'] = AmortService::leading_zeros($request->cycle,4);
        $loanGroups = LoanGroup::create($request->all());
        $request['loan_groups_id'] = $loanGroups->id;

        $loan = Loan::create($request->all());
        $request['loan_id'] = $loan->id;

        Balance::create(['loan_id' => $loan->id,
            'principal_balance' => $request->loan_amount,
            'interest_balance' => $request->interest,
        ]);

        return [
            'success' => true
        ];
    }

    public function processing(Request $request)
    {
        $loan = Loan::find($request->id);
        $computeMaturity = strtotime('+' . $loan->terms . ' day', strtotime($request->date_release));
        $maturityDate = date('Y-m-j', $computeMaturity);
        $loan->update([
            'loan_level_id' => 2,
            'first_payment' => $request->first_payment,
            'date_release' => $request->date_release,
            'date_maturity' => $maturityDate
        ]);

        $collectCharges = collect($request->charges)->map(function($charge, $i) use ($request){
            $charge['loan_id'] = $request->id;
            $charge['created_at'] = date('Y-m-d H:i:s');
            return $charge;
        })->toArray();

        LoanCharge::insert($collectCharges);

        return [
            'success' => true
        ];
    }

    public function approval(Request $request)
    {
        $loan = Loan::find($request->id);
        $loan->update([
            'loan_level_id' => 3,
            'date_approved' => $request->date_approved,
            'approved_by' => $request->approved_by
        ]);

        return [
            'success' => true
        ];
    }

    public function release(Request $request)
    {
        $loan = Loan::find($request->id);
        $loan->update([
            'loan_level_id' => 4,
            'date_release' => $request->date_release,
            'released_by' => $request->released_by,
            'loan_status_id' => 1
        ]);

        $charges = LoanCharge::where('loan_id', $request->id)->with('charge.chartAccount')->get();

        $totalCharge = collect($charges)->sum('amount');

        $amount = $loan->loan_amount - $totalCharge;

        $request['loan_id'] = $loan->id;
        $request['transaction_code_id'] = 4; // transaction code for disbursement or releasing
        $request['credit'] = $amount;
        $request['total_amount'] = $amount;
        $request['principal_balance'] = $loan->loan_amount;
        $request['interest_balance'] = $loan->interest;
        $request['sequence_number'] = 1; // get in the database for sequencial number

        Ledger::create($request->all());

        $glEntry = collect($charges)->map(function($charge, $i) use ($request){
           return [
                'credit' => $charge->amount,
                'debit' => 0,
                'reference_number' => $request->reference_number,
                'chart_account_id' => $charge->charge->chart_account_id,
                'particulars' => 'Loan Disbursement',
                'transaction_type_id' => 1,
                'teller_id' => $request->teller_id,
                'branch_id' => $request->branch_id,
                'sequence_number' => $i + 1,
                'created_at' => date('Y-m-d H:i:s')
            ];
        })->toArray();

        $transGL = $this->transCode->getTransactionChartAccount('DISB');

        $glEntry[] = [ // for cash on hand
            'credit' => $amount,
            'debit' => 0,
            'reference_number' => $request->reference_number,
            'chart_account_id' => $transGL,
            'particulars' => 'Loan Disbursement',
            'transaction_type_id' => 1,
            'teller_id' => $request->teller_id,
            'branch_id' => $request->branch_id,
            'sequence_number' => count($glEntry) + 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $glEntry[] = [ // for loans gl
            'debit' => $loan->loan_amount,
            'credit' => 0,
            'reference_number' => $request->reference_number,
            'chart_account_id' => $loan->loanGroups->loanCode->coaacctcode,
            'particulars' => 'Loan Disbursement',
            'transaction_type_id' => 1,
            'teller_id' => $request->teller_id,
            'branch_id' => $request->branch_id,
            'sequence_number' => count($glEntry) + 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $transaction = DailyTransaction::insert($glEntry);

        return [
            'success' => true
        ];
    }

    public function amortizationSchedule($id)
    {
        $loan = Loan::find($id);

        Amortization::where('loan_id', $loan->id)->delete();

        if ($loan->loanGroups->loanCode->method == 'A') {
            $amort = $this->amortService->diminishing($loan);
        }
        elseif ($loan->loanGroups->loanCode->method == 'D') {
            $amort = $this->amortService->straight($loan);
        }

        Amortization::insert($amort);

        return $amort;
    }

}
