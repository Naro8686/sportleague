<?php
namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrUpdateRacesRequest extends FormRequest
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
            'date' => 'required',
            'name' => 'required',
            'location' => 'required',
            'location_link' => 'required',
            'start_time' => 'required',
            'club_id' => 'required',
            'max_marshals' => 'required|integer|max:150'
        ];
    }
}
