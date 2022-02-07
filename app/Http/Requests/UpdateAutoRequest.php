<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAutoRequest extends FormRequest
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
            'model' => 'required|min:3|max:45',
            'year' => 'required|min:4|max:4',
            'license_plate' => 'required',
            'color' => 'required|min:3|max:45'
        ];
    }
}
