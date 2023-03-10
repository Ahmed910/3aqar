<?php

namespace App\Http\Requests\Api\Profile;

use App\Http\Requests\Api\ApiMasterRequest;

class EditProfileRequest extends ApiMasterRequest
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
        $user = auth('api')->id();

        return [
           'fullname' => 'required|string|between:3,250',
           'email'    => 'nullable|email|unique:users,email,'.$user,
           'phone'    => 'required|numeric|digits_between:5,20|unique:users,phone,'.$user,
           'is_infected' => 'nullable|in:0,1',
           'image'    => 'nullable|image|mimes:jpg,jpeg,png',
           'phone'    => 'required|numeric|digits_between:5,20|unique:users,whatsapp,'.$user,
           'country_id' => 'nullable|exists:countries,id,deleted_at,NULL',
           'city_id' => 'nullable|exists:cities,id,deleted_at,NULL',
        ];
    }

    public function getValidatorInstance()
    {
       $data = $this->all();
       if (isset($data['phone']) && $data['phone']) {
           $data['phone'] = filter_mobile_number($data['phone']);
       }
       if (isset($data['identity_number']) && $data['identity_number']) {
           $data['identity_number'] = convertArabicNumber($data['identity_number']);
       }
       if (isset($data['date_of_birth']) && $data['date_of_birth'] != null) {
           $data['date_of_birth'] = date('Y-m-d', strtotime($data['date_of_birth']));
       }
       if (isset($data['date_of_birth_hijri']) && $data['date_of_birth_hijri'] != null) {
           $data['date_of_birth_hijri'] = date('Y-m-d', strtotime($data['date_of_birth_hijri']));
       }

       $this->getInputSource()->replace($data);
       return parent::getValidatorInstance();
    }

}
