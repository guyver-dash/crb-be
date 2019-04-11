<?php

namespace App\Http\Controllers\API\Loan;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\Loan\AmortService;
use App\Model\Loans\Amortization;
use App\Model\Loans\Balance;
use App\Model\Loans\Loan;
use App\Model\Loans\LoanGroup;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    private $amortService;

    public function __construct(AmortService $amortService)
    {
        $this->amortService = $amortService;
    }

    public function store(Request $request)
    {
        $loanGroups = LoanGroup::create($request->all());
        $request['loan_groups_id'] = $loanGroups->id;

        $loan = Loan::create($request->all());
        $request['loan_id'] = $loan->id;

        Balance::create(['loan_id' => $loan->id,
            'principal_balance' => $request->loan_amount,
            'interest_balance' => $request->interest,
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function processing(Request $request, $id)
    {
        $loan = Loan::find($id);
        $newdate2 = strtotime('+' . $paymentDays . ' day', strtotime($loan->date_applied));
        $paymentDate = date('Y-m-d', $newdate2);

        $loan->update([
            'loan_level_id' => 2,
            'first_payment' => $request->first_payment,
            'date_release' => $request->date_applied,
            // 'maturity_date' =>
        ]);

        return $this->amortizationSchedule($id);
        // return response()->json([
        //     'success' => true
        // ]);
    }

    public function loan_approval($id)
    {
        $loan = Loan::find($id);
    }

    private function amortizationSchedule($id)
    {
        $loan = Loan::find($id);
        Amortization::where('loan_id', $loan->id)->delete();

        $data = $this->amortService->diminishing($loan);

        $amort = Amortization::insert($data);
        return [
            'success' => true,
            'data' => $data,
        ];
    }

}
