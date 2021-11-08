<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Owner\Categories\CategoryTypeRequest;
use App\Http\Resources\Api\Owner\Categories\CategoriesNameResource;
use App\Http\Resources\Api\Owner\Categories\CategoriesResource;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function getCategories(CategoryTypeRequest $request)
    {

        $categories = Category::where('type',$request->type)->orderBy('ordering','asc')->get();
      
        return CategoriesNameResource::collection($categories)->additional(['status'=>'success','message'=>'']);
    }

    public function getFeaturesByCategory($category_id)
    {
         $category = Category::findOrFail($category_id);
         return (new CategoriesResource($category))->additional(['status'=>'success','message'=>'']);
    }
}
