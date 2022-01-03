<?php

namespace App\Http\Requests\Dashboard\District;

use Illuminate\Foundation\Http\FormRequest;

class DistrictRequest extends FormRequest
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
           // 'country_id' => 'nullable|exists:countries,id',
            'lat' => 'required',
            'lng' => 'required',
            'location' => 'required',
            'postal_code' => 'nullable',
            'short_cut' => 'nullable'
        ];
        $district = $this->district ? $this->district->id : null;
        foreach (config('translatable.locales') as $locale) {
            $rules[$locale.'.name'] = 'required|string|between:2,250';
            $rules[$locale.'.slug'] = 'nullable|string|between:3,100000';
            $rules[$locale.'.image'] = 'required|image|mimes:jpg,jpeg,png';
        }
        return $rules;
    }
}
