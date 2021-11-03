<?php

namespace App\Http\Requests\Api\Owner\Categories;

use App\Http\Requests\Api\ApiMasterRequest;
use Illuminate\Foundation\Http\FormRequest;

class CategoriesAndAdsByTypeRequest extends ApiMasterRequest
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
            'category_id'=>'nullable|exists:categories,id'
        ];
    }
}
