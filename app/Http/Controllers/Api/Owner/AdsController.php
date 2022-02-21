<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Owner\Ad\CreateAdRequest;
use App\Http\Requests\Api\Owner\AdRequest;
use App\Http\Requests\Api\Owner\Categories\CategoryTypeRequest;
use App\Http\Resources\Api\Ads\AdDataResource;
use App\Http\Resources\Api\Owner\Ads\AdResource;
use App\Models\Ad;
use App\Models\AppMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function getAllAds()
    {
       $ads = Ad::owner()->latest()->paginate(50);
       return AdDataResource::collection($ads)->additional(['status'=>'success','message'=>'']);
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

           $ad = Ad::create($ad_data+['user_id'=>auth('api')->id(),'last_updated_at'=>now()]);
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

    public function getAdByCity($district_id)
    {

      $ads = Ad::where('district_id',$district_id)->get();

      return AdResource::collection($ads)->additional(['status'=>'success','message'=>'']);
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

    public function deleteImageForAd($ad_id,$image_id)
    {
        $ad = Ad::findOrFail($ad_id);
        if ($ad->media()->findOrFail($image_id)){
            $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Ad','app_mediaable_id' => $ad->id ,'media_type' => 'image'])->findOrFail($image_id);
            $image->delete();
            if (file_exists(storage_path('app/public/images/ad/'.$image->media))){
                \File::delete(storage_path('app/public/images/ad/'.$image->media));
                $image->delete();
            }
            return response()->json(['data'=>null,'status'=>'success','message'=>trans('api.messages.image_deleted')]);
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
