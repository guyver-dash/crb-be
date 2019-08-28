<?php
namespace App\Http\Controllers\API\Loan;

class AmortService
{
    public function diminishing($loan)
    {
        $paymentDays = $loan->paymentMode->days;
        $num_payments = round($loan->terms / $paymentDays);
        $ctr = 1;
        $principal = $loan->loan_amount;
        $paymentDate = $loan->first_payment;
        $tempAmortTermRate = ($loan->rate / 360) * $loan->terms; // convert rate with terms
        $amortTermRate = ($tempAmortTermRate / $num_payments) / 100;

        if ($loan->paymentMode->id == 2) // FOR WEEKLY
        {
            $amortTermRate = round($amortTermRate, 4);
        }

        $powerTo = pow(1 + $amortTermRate, -$num_payments); // compute tha raise to the power amount / transaction
        $computeAmortAmount = ceil(round($principal * $amortTermRate / (1 - $powerTo), 2)); //compute amortization amount
        $balance = $principal;

        $insertAmort = array();
        while ($ctr <= $num_payments) {
            $interestAmount = ceil(number_format(($balance * $amortTermRate), 2, '.', ''));
            $principalAmount = $computeAmortAmount - $interestAmount;

            $totalPayment = $principalAmount + $interestAmount;
            $balance -= $principalAmount;

            if ($ctr != 1) { // for next payment
                $newdate2 = strtotime('+' . $paymentDays . ' day', strtotime($paymentDate));
                $paymentDate = date('Y-m-d', $newdate2);
            }

            if ($ctr == $num_payments) { // for last payment
                $newdate2 = strtotime('+' . $loan->terms . ' day', strtotime($loan->date_release));
                $paymentDate = date('Y-m-d', $newdate2);

                if ($balance > 0) {
                    $principalAmount += $balance;
                    $balance = 0;
                }
            }

            $data[] = [
                'loan_id' => $loan->id,
                'payment_date' => $paymentDate,
                'principal' => $principalAmount,
                'interest' => $interestAmount,
                'total_payment' => $totalPayment,
                'payment_sequence' => $ctr,
                'balance' => $balance,
            ];

            $ctr++;
        }

        return $data;
    }

    public function straight($loan)
    {
        $paymentDays = $loan->paymentMode->days;
        $paymentDate = $loan->first_payment;
        $num_payments = round($loan->terms / $paymentDays);
        $ctr = 1;
        $principal = $loan->loan_amount;
        $interest = $loan->interest;
        $balance = $principal;

        $principalAmount = round($principal / $num_payments, 2);
        $interestAmount = round($interest / $num_payments, 2);
        $insertAmort = array();
        while ($ctr <= $num_payments) {
            $balance -= $principalAmount;
            $totalPayment = $principalAmount + $interestAmount;
            if ($ctr != 1) { // for next payment
                $newdate2 = strtotime('+' . $paymentDays . ' day', strtotime($paymentDate));
                $paymentDate = date('Y-m-d', $newdate2);
            }

            if ($ctr == $num_payments) { // for last payment
                $newdate2 = strtotime('+' . $loan->terms . ' day', strtotime($loan->date_release));
                $paymentDate = date('Y-m-d', $newdate2);

                if ($balance > 0) {
                    $principalAmount += $balance;
                    $balance = 0;
                }
            }

            $data[] = [
                'loan_id' => $loan->id,
                'payment_date' => $paymentDate,
                'principal' => $principalAmount,
                'interest' => $interestAmount,
                'total_payment' => $totalPayment,
                'payment_sequence' => $ctr,
                'balance' => $balance,
            ];

            $ctr++;
        }

        return $data;
    }
}
