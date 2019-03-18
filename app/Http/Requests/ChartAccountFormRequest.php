<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ChartAccountFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'company_id' => 'integer|required',
            'account_code' => 'integer|required',
            'account_display' => 'string:15|required',
            'name' => 'required|alpha_spaces',
            'taccount_id' => 'integer|required'
        ];
    }
}
