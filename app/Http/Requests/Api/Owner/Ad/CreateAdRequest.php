<?php

namespace App\Http\Requests\Api\Owner\Ad;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class CreateAdRequest extends ApiMasterRequest
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

        if(isset($this->ad) && $this->ad)
        {
            $image_validation = 'nullable|array';
            $value ='nullable';

        }else{
            $image_validation = 'required|array';
            $value ='required';
        }

        return [
            'ad_type'=>'required|in:rent,sale',
            'category_id'=>'required|exists:categories,id',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'address'=>'required|between:3,150',
            'frontage_id'=>'nullable|exists:frontages,id',
            'residence_type_id'=>'nullable|exists:residence_types,id',
            'price' => 'required|numeric|gt:0',
            'desc'=>'nullable|between:3,150',
            'advertiser_relationship_with_aqar'=>'required|string',
            'feature'=>$image_validation,
            'images'=>$image_validation,
            'district_id'=>'nullable|exists:districts,id',
            'city_id'=>'nullable|exists:cities,id',
            'images.*'         => 'image|mimes:png,jpg,jpeg,gif',
            'feature.*.feature_id' => 'integer|exists:features,id',
            'feature.*.value' => $value,
            'period_id'=>'nullable|exists:periods,id',
            'population_type_id'=>'nullable|exists:population_types,id',
            'round_type'=>'nullable|in:ground,upstairs',
            'north'=>'nullable|required_if:ad_type,sale|between:2,150',
            'south'=>'nullable|required_if:ad_type,sale|between:2,150',
            'east'=>'nullable|required_if:ad_type,sale|between:2,150',
            'west'=>'nullable|required_if:ad_type,sale|between:2,150',
            'disputes'=>'nullable|required_if:ad_type,sale|in:yes,no',
            'mortgage_or_bond'=>'nullable|required_if:ad_type,sale|in:yes,no',
        ];
    }
}
