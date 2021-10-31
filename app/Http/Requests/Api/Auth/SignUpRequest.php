<?php

namespace App\Http\Requests\Api\Auth;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Support\Str;
use App\Models\{User};

class SignUpRequest extends ApiMasterRequest
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
            'fullname' => 'required|string|between:3,250',
            'password' => 'required|confirmed|min:6',
            'email'    => 'nullable|email|unique:users,email,NULL,id,deleted_at,NULL',
            'phone'    => 'required|numeric|digits_between:5,20|starts_with:9665,05|unique:users,phone',
            'whatsapp'    => 'required|numeric|digits_between:5,20|starts_with:9665,05|unique:users,whatsapp',
            'gender'   => 'nullable|in:male,female',

            'image'    => 'nullable|image|mimes:jpg,jpeg,png',
            'country_id' => 'nullable|required_if:user_type,driver|required_with:city_id|exists:countries,id',
            'city_id' => 'nullable|exists:cities,id',
            // 'user_type' => 'required|in:client,driver',

            // If Driver

            // 'identity_number_image' => 'nullable|required_if:user_type,driver|image|mimes:jpg,jpeg,png',
            // 'identity_number' => 'nullable|numeric|digits_between:5,25|unique:users,identity_number',
            // 'date_of_birth' => 'nullable|date|before:'.date("Y-m-d"),
            // 'date_of_birth_hijri' => 'nullable|date|date_format:Y-m-d',

            // 'lat' => 'nullable|numeric',
            // 'lng' => 'nullable|numeric',
            // 'location' => 'nullable|string|between:3,250',


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
       $data['health_file_type'] = 'image';
       if (isset($data['health_certificate']) && $data['health_certificate'] != null) {
           if($data['health_certificate']->getClientMimeType() == 'application/pdf') {
               $data['health_file_type'] = 'file';
           }
       }


       $this->getInputSource()->replace($data);
       return parent::getValidatorInstance();
    }

}
