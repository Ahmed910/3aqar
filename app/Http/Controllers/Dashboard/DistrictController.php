<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{District,Country};
use App\Http\Requests\Dashboard\District\{DistrictRequest};

class DistrictController extends Controller
{

    public function index()
    {
        if (!request()->ajax()) {
          $districts = District::latest()->paginate(100);
          return view('dashboard.district.index',compact('districts'));
        }
    }
    public function create(Request $request)
    {
      if (!request()->ajax()) {
          if ($request->country_id) {
              $data['country_id'] = $request->country_id;
          }
          $data['countries'] = Country::get()->pluck('name','id');
          return view('dashboard.district.create',$data);
      }
    }
    public function store(DistrictRequest $request)
    {
        if (!request()->ajax()) {
            $country =Country::first();
            if(isset($country) && $country){
                District::create(array_except($request->validated(),['image'])+['country_id'=>$country->id]);
                return redirect(route('dashboard.district.index'))->withTrue(trans('dashboard.messages.success_add'));
            }
            return redirect()->back()->withFalse(trans('api.messages.countries_not_found'));

        }
    }
    public function show(District $district)
    {
        if (!request()->ajax()) {
           return view('dashboard.district.show',compact('district'));
        }
    }

    public function edit(District $district)
    {
        if (!request()->ajax()) {
            $countries =Country::get()->pluck('name','id');
            return view('dashboard.district.edit',compact('countries','district'));
        }
    }

    public function update(DistrictRequest $request, District $district)
    {
        if (!request()->ajax()) {
           $district->update(array_except($request->validated(),['image']));
           return redirect(route('dashboard.district.index'))->withTrue(trans('dashboard.messages.success_update'));
        }
    }
    public function destroy(District $district)
    {
        if ($district->delete()) {
          return response()->json(['value' => 1]);
        }
    }
}
