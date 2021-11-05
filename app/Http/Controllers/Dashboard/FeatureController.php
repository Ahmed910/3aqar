<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feature;
use App\Http\Requests\Dashboard\Feature\FeaureRequest;

class FeatureController extends Controller
{
    public function index()
    {
          $features = \DB::table('features')->latest()->paginate(100);
          return view('dashboard.feature.index',compact('features'));
        
    }
    public function create()
    {
      if (!request()->ajax()) {
          return view('dashboard.feature.create');
      }
    }
    public function store(FeaureRequest $request)
    {
        if (!request()->ajax()) {
           Feature::create(array_except($request->validated(),['image']));
           return redirect(route('dashboard.feature.index'))->withTrue(trans('dashboard.messages.success_add'));
        }
    }
    public function show(Feature $feature)
    {
        if (!request()->ajax()) {
           return view('dashboard.feature.show',compact('feature'));
        }
    }
    public function edit(Feature $feature)
    {
        if (!request()->ajax()) {
            $features = Feature::get()->pluck('name_ar','id');
            return view('dashboard.feature.edit',compact('features','feature'));
        }
    }
    public function update(FeaureRequest $request, Feature $feature)
    {
        if (!request()->ajax()) {
           $feature->update(array_except($request->validated(),['image']));
           return redirect(route('dashboard.feature.index'))->withTrue(trans('dashboard.messages.success_update'));
        }
    }
    public function destroy(Feature $feature)
    {
        if ($feature->delete()) {
          return response()->json(['value' => 1]);
        }
    }
}
