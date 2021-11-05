<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontage;
use App\Http\Requests\Dashboard\Frontage\FrontageRequest;

class FrontageController extends Controller
{
    public function index()
    {
          $frontages = Frontage::latest()->paginate(100);
          return view('dashboard.frontage.index',compact('frontages'));
        
    }
    public function create()
    {
      if (!request()->ajax()) {
          return view('dashboard.frontage.create');
      }
    }
    public function store(FrontageRequest $request)
    {
        if (!request()->ajax()) {
           Frontage::create(array_except($request->validated(),['image']));
           return redirect(route('dashboard.frontage.index'))->withTrue(trans('dashboard.messages.success_add'));
        }
    }
    public function show(Frontage $frontage)
    {
        if (!request()->ajax()) {
           return view('dashboard.frontage.show',compact('frontage'));
        }
    }
    public function edit(Frontage $frontage)
    {
        if (!request()->ajax()) {
            $frontages = Frontage::get()->pluck('name_ar','id');
            return view('dashboard.frontage.edit',compact('frontages','frontage'));
        }
    }
    public function update(FrontageRequest $request, Frontage $frontage)
    {
        if (!request()->ajax()) {
           $frontage->update(array_except($request->validated(),['image']));
           return redirect(route('dashboard.frontage.index'))->withTrue(trans('dashboard.messages.success_update'));
        }
    }
    public function destroy(Frontage $frontage)
    {
        if ($frontage->delete()) {
          return response()->json(['value' => 1]);
        }
    }
}
