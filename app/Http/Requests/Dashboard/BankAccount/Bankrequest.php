<?php

namespace App\Http\Requests\Dashboard\BankAccount;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
            'account_holder_name' => 'required',
            'bank_name' => 'required',
            'account_number' => 'required',
            'iban_number' => 'required',
            'bank_image' => 'nullable',
        ];
    }
}
