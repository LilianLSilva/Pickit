<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAutoRequest extends FormRequest
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
            'owner_id' => 'required',
            'brand' => 'required|min:3|max:45',
            'model' => 'required|min:2|max:45',
            'year' => 'required|digits:4',
            'license_plate' => 'required|unique:autos,license_plate',
            'color' => 'required|min:3|max:45'
        ];
    }
}
