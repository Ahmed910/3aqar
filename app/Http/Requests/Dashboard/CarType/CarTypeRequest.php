<?php

namespace App\Http\Requests\Dashboard\CarType;

use Illuminate\Foundation\Http\FormRequest;

class CarTypeRequest extends FormRequest
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
        $rules=[
            'image' => 'nullable|image|mimes:png,jpg,jpeg,gif',
            'number_of_seats' => 'nullable|integer|gt:0',
            'is_for_goods_only' => 'required|in:0,1',
        ];
        foreach (config('translatable.locales') as $locale) {
            $rules[$locale.'.name'] = 'required|string|between:2,250';
            $rules[$locale.'.desc'] = 'nullable|string|between:3,100000';
        }
        return $rules;
    }
}
