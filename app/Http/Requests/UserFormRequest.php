<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use app\Traits\Obfuscate\Optimuss;
use App\Model\User;

class UserFormRequest extends FormRequest
{
    use Optimuss;
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
        $user = User::find($this->optimus()->encode($this->get('id')));
        return [
            'information.firstname' => 'alpha_spaces|required',
            'information.middlename' => 'alpha_spaces|required',
            'information.lastname' => 'alpha_spaces|required',
            'email' => 'required|email|unique:users,email,'.$user->id,
        ];
    }
}
