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
        $loan->update([
            'loan_level_id' => 2,
            'first_payment' => $request->first_payment,
            'date_release' => $request->date_applied,
        ]);

        return $this->amortizationSchedule($id);
        // return response()->json([
        //     'success' => true
        // ]);
    }

    public function amortizationSchedule($id)
    {
        $loan = Loan::find($id);
        Amortization::where('loan_id', $loan->id)->delete();
        dd($loan->loanGroups->toArray());
        $data = $this->amortService->diminishing($loan);

        $amort = Amortization::insert($data);
        return [
            'success' => true,
            'data' => $data,
        ];
    }

}
