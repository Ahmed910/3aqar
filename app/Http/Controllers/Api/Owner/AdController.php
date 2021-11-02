<?php

namespace App\Http\Controllers\Api\Owner;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Owner\Ad\CreateAdRequest;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

           $ad = Ad::create($ad_data);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
