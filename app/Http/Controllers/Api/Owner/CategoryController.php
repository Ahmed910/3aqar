<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Controller;


use App\Http\Resources\Api\Owner\Categories\CategoriesResource;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
   

    public function getFeaturesByCategory($category_id)
    {
         $category = Category::findOrFail($category_id);
         return (new CategoriesResource($category))->additional(['status'=>'success','message'=>'']);
    }
}
