<?php

namespace App\Http\Controllers\API\Loan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Loans\Ledger;
use App\Model\Loans\Loan;
use App\Model\Loans\Amortization;

class InformationController extends Controller
{

    public function showLedger($id)
    {
        return Ledger::where('loan_id', $id)->get();
    }

    public function showLoanInfo($id)
    {
        return Loan::find($id);
    }

    public function showAmortization($id)
    {
        return Amortization::where('loan_id', $id)->get();
    }

    public function showAmortizationStatus($id)
    {
        $amort = Amortization::where('loan_id', $id)->get();
        $i = 1;
        foreach ($amort as $val) {
            echo $i.". ";
            echo $val['principal']."<br>";
            $i++;
        }
    }

}
