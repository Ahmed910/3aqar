<?php

namespace App\Http\Requests\Api\User\Contracts;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class ContractRequest extends ApiMasterRequest
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
            'identity_number_image_for_owner'=>'required|image|mimes:png,jpg,jpeg,gif',
            'property_document'=>'required|image|mimes:png,jpg,jpeg,gif',
            'address_image'=>'nullable|image|mimes:png,jpg,jpeg,gif',
            'identity_number_image_for_citizen'=>'required|image|mimes:png,jpg,jpeg,gif',
            'national_address_for_citizen'=>'nullable|image|mimes:png,jpg,jpeg,gif',
            'building_date'=>'required|date',
            'aqar_number'=>'nullable|integer',
            'aqar_address'=>'required|string|between:2,200',
            'iban_num'=>'nullable',
            'phone_for_owner'=>'required|numeric|digits_between:5,20|starts_with:9665,05|unique:contracts,phone_for_owner',
            'phone_for_citizen'=>'required|numeric|digits_between:5,20|starts_with:9665,05|unique:contracts,phone_for_citizen',
        ];
    }

    public function getValidatorInstance()
    {
       $data = $this->all();

       if (isset($data['building_date']) && $data['building_date'] != null) {
           $data['building_date'] = date('Y-m-d', strtotime($data['building_date']));
       }




       $this->getInputSource()->replace($data);
       return parent::getValidatorInstance();
    }

}
