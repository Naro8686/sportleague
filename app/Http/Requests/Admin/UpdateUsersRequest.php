<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsersRequest extends FormRequest
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
        $user_id = \Request::segment(3);
        return [
            'first_name' => 'required',
            'last_name' => 'required',
//            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$user_id
        ];
    }
}
