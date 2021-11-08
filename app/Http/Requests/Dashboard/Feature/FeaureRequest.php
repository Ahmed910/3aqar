<?php

namespace App\Http\Requests\Dashboard\Feature;

use Illuminate\Foundation\Http\FormRequest;

class FeaureRequest extends FormRequest
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
            'name' => 'required',
            'name_ar' => 'required',
            'images' => 'nullable',
            'data_type' => 'required',
            'min' => 'nullable',
            'max' => 'nullable',
            'start_value' => 'nullable',
            'end_value' => 'nullable'
        ];
    }
}
