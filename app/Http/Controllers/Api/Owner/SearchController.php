<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Owner\Categories\CategoriesAndAdsByTypeRequest;
use App\Http\Resources\Api\Owner\Ads\AdResource;
use App\Http\Resources\Api\Owner\Ads\AdSearchResource;
use App\Http\Resources\Api\Owner\Categories\CategoriesNameResource;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function getCategoriesAndAdsByType(CategoriesAndAdsByTypeRequest $request)
    {
        $data=[];
        $categories = Category::when($request->type,function($q) use($request){
            $q->where('type',$request->type);
        })->get();
        $ads = Ad::when($request->type,function($q) use ($request){
            $q->where('ad_type',$request->type);
        })->get();

        $data['categories'] = CategoriesNameResource::collection($categories);
        $data['ads'] = AdSearchResource::collection($ads);
        return response()->json(['data'=>$data,'status'=>'success','message'=>'']);
    }

    public function getAdsByTypeAndCategory(CategoriesAndAdsByTypeRequest $request)
    {
        $ads = Ad::when($request->type,function($q) use($request){
            $q->where('ad_type',$request->type);
        })->when($request->category_id,function($q) use($request){
            $q->where('category_id',$request->category_id);
        })->get();

        return AdSearchResource::collection($ads)->additional(['status'=>'success','message'=>'']);
    }
}
