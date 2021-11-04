<?php

namespace App\Http\Controllers\Api\Help;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Help\{CountryResource , CityResource, DistrictResource};
use App\Models\{Country , City, District};

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::latest()->get();
        return CountryResource::collection($countries)->additional(['status' => 'success','message'=>'']);
    }

    public function show()
    {
        $country = Country::first();
        $districts = District::where('country_id',$country->id)->latest()->get();
        return DistrictResource::collection($districts)->additional(['status' => 'success','message'=>'']);
    }

    public function getCities($id)
    {
        $cities = City::where('district_id',$id)->latest()->get();
        return CityResource::collection($cities)->additional(['status' => 'success','message'=>'']);
    }

}
