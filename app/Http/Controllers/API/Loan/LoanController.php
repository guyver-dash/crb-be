<?php

namespace App\Http\Controllers\API\Loan;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoanFormRequest;
use App\Model\Loans\Loan;
use App\Model\Loans\LoanGroup;
use App\Model\Loans\Balance;
use App\Model\Loans\Amortization;

class LoanController extends Controller
{
    public function store(Request $request)
    {
        $loan = Loan::create($request->all());
        $request['loan_id'] = $loan->id;

        Balance::create([ 'loan_id' => $loan->id,
                        'principal_balance' => $request->loan_amount,
                        'interest_balance' => $request->interest
        ]);

        LoanGroup::create($request->all());

        return response()->json([
            'success' => true
        ]);
    }

    public function processing(Request $request, $id)
    {
        $loan = Loan::find($id);
        $loan->update([
            'loan_level_id' => 2,
            'first_payment' => $request->first_payment,
            'date_release' => $request->date_applied
        ]);
        $this->amortizationSchedule($id);
        // return response()->json([
        //     'success' => true
        // ]);
    }

    public function amortizationSchedule($id)
    {
        $loan = Loan::all($id);
        $paymentDays = $loan->paymentMode->days;
        $num_payments = round( $loan->terms / $paymentDays);
        $ctr = 1;
        $principal = $loan->loan_amount;
        $paymentDate = $loan->first_payment;
        $tempAmortTermRate = ( $loan->rate / 360 ) * $loan->terms; // convert rate with terms
        $amortTermRate = ($tempAmortTermRate / $num_payments) / 100;

        if($loan->paymentMode->id == 2) // FOR WEEKLY
		{
			$amortTermRate = round($amortTermRate, 4);
        }

        $powerTo = pow(1+$amortTermRate , -$num_payments); // compute tha raise to the power amount / transaction
		$computeAmortAmount = ceil(round($principal * $amortTermRate / (1 - $powerTo), 2)); //compute amortization amount
        $balance = $principal;
        $insertAmort = array();
        while($ctr <= $num_payments)
        {
            $intAmount = ceil(number_format(($balance  * $amortTermRate), 2, '.', ''));
            $principalAmount =  $computeAmortAmount - $intAmount;

            if ($ctr != 1) { // for firstpayment
                $newdate2 = strtotime('+' .$paymentDays.' day', strtotime ( $paymentDate ) ) ;
                $paymentDate = date('Y-m-d' , $newdate2 );
            }

            if ($ctr == $num_payments ) { // for last payment
                $newdate2 = strtotime('+180 day', strtotime ( $loan->date_applied ) ) ;
                $paymentDate = date('Y-m-d' , $newdate2 );
            }

            $totalPayment = $computePrincipal + $intAmount;

            $data[] = [
                'loan_id' => $loan->id,
                'payment_date' => $paymentDate,
                'principal' => $computePrincipal,
                'interest' => $intAmount,
                'total_payment' => $totalPayment,
                'payment_sequence' => $ctr
            ];

            $balance -= $computePrincipal;
            $ctr++;
        }

        Amortization::insert($data);
        //
    }

}
