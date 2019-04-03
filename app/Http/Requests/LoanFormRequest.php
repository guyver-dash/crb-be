<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanFormRequest extends FormRequest
{
<<<<<<< HEAD
=======


>>>>>>> 231e3308cb3c55351965c2323e829447be35e15a
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
<<<<<<< HEAD
=======

>>>>>>> 231e3308cb3c55351965c2323e829447be35e15a
        return [
            'account_id' => 'required',
            'cycle' => 'required',
            'loan_amount' => 'required',
            'rate' => 'required',
            'interest' => 'required',
            'terms' => 'required',
            'date_applied' => 'required',
            'date_approved' => 'required',
            'date_maturity' => 'required',
            'payment_mode_id' => 'required',
            'loan_level_id' => 'required',
            'loan_status_id' => 'required',
            'first_payment' => 'required',
            'grace' => 'required',
            'date_release' => 'required',
            'irr_rate' => 'required',
            'approved_by' => 'required',
            'override_user' => 'required'
        ];
    }
}
