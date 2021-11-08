<?php

namespace App\Http\Controllers\Api\Help;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Ad,Category};
use App\Http\Requests\Api\Owner\Categories\CategoryTypeRequest;
use App\Http\Requests\Api\Ads\FilterAdsUsingFeaturesRequest;
use App\Http\Requests\Api\Owner\Categories\CategoriesAndAdsByTypeRequest;
use Carbon\Carbon;
use App\Http\Resources\Api\Owner\Categories\CategoriesNameResource;
use App\Http\Resources\Api\Ads\AdDataResource;
use App\Http\Resources\Api\Owner\Ads\AdResource;
use App\Http\Resources\Api\Owner\Ads\AdSearchResource;

class HomeAdsController extends Controller
{
    public function getDetailsForAdAndSimilars($id)
    {
        $ad = Ad::findOrFail($id);
        $watchs = $ad->watching_number;
        $watchs++;
        $ad->update(['watching_number'=>$watchs]);
        $data['current_ad'] = new AdResource($ad);
        $ads =Ad::where('id','!=',$id)->where('ad_type',$ad->ad_type)->inRandomOrder()->take(2)->get();
        $data['ads']=AdDataResource::collection($ads);
        return response()->json(['data'=>$data,'status'=>'success','message'=>'']);
    }

    public function getCategories(CategoryTypeRequest $request)
    {

        $categories = Category::where('type',$request->type)->orderBy('ordering','asc')->get();
      
        return CategoriesNameResource::collection($categories)->additional(['status'=>'success','message'=>'']);
    }

    public function filterAds(FilterAdsUsingFeaturesRequest $request)
    {

        // dd(gettype(boolval($request->time)));
        $ads = Ad::when($request->type, function ($q) use ($request) {
            $q->where('ad_type', $request->type);
        })->when($request->category_id, function ($q) use ($request) {

            $q->where('category_id', $request->category_id);
        })->when((isset($request->lat) && isset($request->lng)), function ($q) use ($request) {

            $q->where(['lat' => $request->lat, 'lng' => $request->lng]);
        })->when($request->time, function ($q) use ($request) {
            switch ($request->time) {
                case true:
                    $q->whereBetween('created_at', [Carbon::now()->subDays('14')->format('Y-m-d'), Carbon::now()->format('Y-m-d')]);
                    break;
                default:
                    break;
            }
        })->when($request->features, function ($q) use ($request) {

            foreach ($request->features as $feature) {

                $q->whereHas('features', function ($q) use ($feature,$request) {

                    $q->where('feature_id', $feature['feature_id'])->when($request->min,function($q)use($request){
                        $q->where('value','>=',$request->min)->where('value','<=',$request->max);
                    });
                });
            }

        })->when(($request->lowest_area && $request->highest_area), function ($q) use ($request) {
            $q->whereHas('features', function ($q) use ($request) {

                $q->where('name','Area')->whereBetween('value', [$request->lowest_area, $request->highest_area]);
            });
        })->when(($request->lowest_price && $request->highest_price), function ($q) use ($request) {
            $q->whereBetween('price', [$request->lowest_price, $request->highest_price]);
        })->when($request->frontage_id, function ($q) use ($request) {
            $q->where('frontage_id', $request->frontage_id);
        })->when($request->residence_type_id, function ($q) use ($request) {
            $q->where('residence_type_id', $request->residence_type_id);
        })->when($request->population_type_id, function ($q) use ($request) {
            $q->whereHas('rent', function ($q) use ($request) {
                $q->where('population_type_id', $request->population_type_id);
            });
        })->when($request->period_id, function ($q) use ($request) {
            $q->whereHas('rent', function ($q) use ($request) {
                $q->where('period_id', $request->period_id);
            });
        })->when($request->round_type, function ($q) use ($request) {
            $q->whereHas('rent', function ($q) use ($request) {
                $q->where('round_type', $request->round_type);
            });
        })->get();

        return AdDataResource::collection($ads)->additional(['status'=>'success','message'=>'']);
    }

    public function getAdsByTypeAndCategory(CategoriesAndAdsByTypeRequest $request)
    {
        $ads = Ad::when($request->type, function ($q) use ($request) {
            $q->where('ad_type', $request->type);
        })->when($request->category_id, function ($q) use ($request) {
            $q->where('category_id', $request->category_id);
        })->get();

        return AdDataResource::collection($ads)->additional(['status' => 'success', 'message' => '']);
    }

    public function getCategoriesAndAdsByType(CategoriesAndAdsByTypeRequest $request)
    {
        $data = [];
        $categories = Category::when($request->type, function ($q) use ($request) {
            $q->where('type', $request->type);
        })->get();
        $ads = Ad::when($request->type, function ($q) use ($request) {
            $q->where('ad_type', $request->type);
        })->get();

        $data['categories'] = CategoriesNameResource::collection($categories);
        $data['ads'] = AdSearchResource::collection($ads);
        return response()->json(['data' => $data, 'status' => 'success', 'message' => '']);
    }

}
