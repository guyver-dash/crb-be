<?php

namespace App\Http\Controllers\API\Loan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoanFormRequest;
use App\Model\Loans\Loan;
use App\Model\Loans\LoanGroup;
use App\Model\Loans\Balance;

class LoanController extends Controller
{
    public function store(LoanFormRequest $request)
    {
        $loan = Loan::create($request->all());

        Balance::create([ 'loan_id' => $loan->id,
                        'principal_balance' => $request->loan_amount,
                        'interest_balance' => $request->interest,
                        'last_movement_principal' => $request->date_approved,
                        'last_movement_interest' => $request->date_approved
        ]);

        LoanGroup::create(['loan_id' => $loan->id,
                        'loancategory_id' => $request->loancategory_id,
                        'officer_id' => $request->officer_id,
                        'collector_id' => $request->collector_id,
                        'groups_id' => $request->groups_id,
                        'barangay_id' => $request->barangay_id,
                        'lending_id' => $request->lending_id,
                        'office_id' => $request->office_id,
                        'economic_id' => $request->economic_id,
                        'subproject_id' => $request->subproject_id
        ]);

        return response()->json([
            'success' => true
        ]);
    }

}
