<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Owner\Ad\CreateAdRequest;
use App\Http\Requests\Api\Owner\AdRequest;
use App\Http\Requests\Api\Owner\Categories\CategoryTypeRequest;
use App\Http\Resources\Api\Ads\AdDataResource;
use App\Http\Resources\Api\Owner\Ads\AdResource;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdRequest $request)
    {
        $ads = Ad::when($request->search == 'price',function($q) use($request){
                 $q->orderBy('price','DESC')->take(5);
        })->when($request->search == 'area',function($q) use($request){
            $q->whereHas('features',function($q)use($request){
                $q->where('name','Area')->orderBy('value','DESC')->take(5);
                // $q->orderBy('value','DESC')->take(5);
            });
        })->latest()->take(5)->get();

        return AdDataResource::collection($ads)->additional(['status'=>'success','message'=>'']);
    }


    public function getAllAds()
    {
       $ads = Ad::owner()->latest()->paginate(50);
       return AdDataResource::collection($ads)->additional(['status'=>'success','message'=>'']);
    }

    public function getDetailsForAdAndSimilars($id)
    {
        $ad = Ad::findOrFail($id);
        $data['current_ad'] = new AdResource($ad);
        $ads =Ad::where('id','!=',$id)->where('ad_type',$ad->ad_type)->inRandomOrder()->take(2)->get();
        $data['ads']=AdDataResource::collection($ads);
        return response()->json(['data'=>$data,'status'=>'success','message'=>'']);
    }

    public function closeAd($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->update(['is_closed'=>true]);
        return response()->json(['data'=>null,'status'=>'success','message'=>trans('api.messages.ad_is_closed_successfully')]);

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAdRequest $request)
    {

        $ad_features = ['feature'];
        $ad_rent = ['period_id', 'population_type_id', 'round_type'];
        $ad_sale = ['north', 'south', 'east', 'west', 'disputes', 'mortgage_or_bond'];

        $ad_data = array_except($request->validated(),array_merge($ad_features,$ad_rent,$ad_sale));
        $arr=[];
        foreach($request->feature as $feature){
          $arr[$feature['feature_id']]=['value'=>$feature['value']];

        }

        DB::beginTransaction();

        try {

           $ad = Ad::create($ad_data+['user_id'=>auth('api')->id()]);
           $ad->features()->sync($arr);
           switch($request->ad_type)
           {
             case "sale":
                $ad->sale()->create(array_only($request->validated(),$ad_sale));
                break;
             default:
                $ad->rent()->create(array_only($request->validated(),$ad_rent));
           }


           DB::commit();
           return response()->json(['data' => null, 'status' => 'success', 'message' => trans('api.messages.ad_created_successfully')]);
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['data' => null, 'status' => 'fail', 'message' => trans('api.messages.there_is_an_error_try_again')],400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ad = Ad::owner()->findOrFail($id);
        return (new AdResource($ad))->additional(['status'=>'success','message'=>'']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAdRequest $request, $ad_id)
    {

        $ad_features = ['feature'];
        $ad_rent = ['period_id', 'population_type_id', 'round_type'];
        $ad_sale = ['north', 'south', 'east', 'west', 'disputes', 'mortgage_or_bond'];

        $ad_data = array_except($request->validated(),array_merge($ad_features,$ad_rent,$ad_sale));
        $arr=[];

        foreach($request->feature as $feature){

          $arr[$feature['feature_id']]=['value'=>$feature['value']];

        }


        DB::beginTransaction();

        try {

           $ad = Ad::findOrFail($ad_id);
           $ad->update($ad_data+['user_id'=>auth('api')->id(),'last_updated_at'=>now()]);
           $ad->features()->sync($arr);
           switch($request->ad_type)
           {
             case "sale":
                $ad->sale()->update(array_only($request->validated(),$ad_sale));
                break;
             default:
                $ad->rent()->update(array_only($request->validated(),$ad_rent));
           }


           DB::commit();
           return response()->json(['data' => null, 'status' => 'success', 'message' => trans('api.messages.ad_updated_successfully')]);
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['data' => null, 'status' => 'fail', 'message' => trans('api.messages.there_is_an_error_try_again')],400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::findOrFail($id);
        $ad->delete();
        return response()->json(['data'=>null,'status'=>'success','message'=>trans('api.messages.ad_deleted_successfully')]);
    }
}