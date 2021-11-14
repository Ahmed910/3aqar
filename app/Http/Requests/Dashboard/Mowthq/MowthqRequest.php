<?php

namespace App\Http\Requests\Dashboard\Mowthq;

use Illuminate\Foundation\Http\FormRequest;

class MowthqRequest extends FormRequest
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
            'fullname' => 'required',
            'city_id' => 'nullable|exists:cities,id',
            'district_id' => 'required|exists:districts,id',
            'phone' => 'required',
        ];
    }
}
