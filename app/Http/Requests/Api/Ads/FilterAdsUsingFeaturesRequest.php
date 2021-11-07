<?php

namespace App\Http\Requests\Api\Ads;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class FilterAdsUsingFeaturesRequest extends ApiMasterRequest
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
            'type'=>'nullable|in:rent,sale',
            'category_id'=>'nullable|exists:categories,id',
            'lat'=>'nullable|numeric',
            'lng'=>'nullable|numeric',
            'time'=>'required|boolean',
            'features'=>'nullable|array',
            'features.*.feature_id'=>'nullable|exists:features,id',
            'features.*.value'=>'nullable',
            'lowest_area'=>'nullable|numeric',
            'highest_area'=>'nullable|numeric',
            'lowest_price'=>'nullable|numeric',
            'highest_price'=>'nullable|numeric',
            'frontage_id'=>'nullable|exists:frontages,id',
            'residence_type_id'=>'nullable|exists:residence_types,id',
            'population_type_id'=>'nullable|exists:population_types,id',
            'period_id'=>'nullable|exists:periods,id',
            'round_type'=>'nullable|in:ground,upstairs',
        ];
    }
}
