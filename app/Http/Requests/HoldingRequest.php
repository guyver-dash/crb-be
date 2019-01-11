<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HoldingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // $holding = Holding::find($this->route('holdings'));

        // return $holding && $this->user()->can('update', $comment);
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
            'name' => 'required|unique:post|max:255',
            'desc' => 'required|max:255'
        ];
    }
}
