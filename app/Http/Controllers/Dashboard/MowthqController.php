<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Mowthq,City};
use App\Http\Requests\Dashboard\Mowthq\MowthqRequest;

class MowthqController extends Controller
{
    public function index()
    {
          $mowthqs = Mowthq::latest()->paginate(100);
          return view('dashboard.mowthq.index',compact('mowthqs'));
        
    }
    public function create()
    {
      if (!request()->ajax()) {
          $cities = City::latest()->get()->pluck('name','id');
          return view('dashboard.mowthq.create',compact('cities'));
      }
    }
    public function store(MowthqRequest $request)
    {
        if (!request()->ajax()) {
           Mowthq::create(array_except($request->validated(),['image']));
           return redirect(route('dashboard.mowthq.index'))->withTrue(trans('dashboard.messages.success_add'));
        }
    }
    public function show(Mowthq $mowthq)
    {
        if (!request()->ajax()) {
           return view('dashboard.mowthq.show',compact('mowthq'));
        }
    }
    public function edit(Mowthq $mowthq)
    {
        if (!request()->ajax()) {
            $mowthqs = Mowthq::get()->pluck('fullname','id');
            $cities = City::latest()->get()->pluck('name','id');
            return view('dashboard.mowthq.edit',compact('mowthqs','mowthq','cities'));
        }
    }
    public function update(MowthqRequest $request, Mowthq $mowthq)
    {
        if (!request()->ajax()) {
           $mowthq->update(array_except($request->validated(),['image']));
           return redirect(route('dashboard.mowthq.index'))->withTrue(trans('dashboard.messages.success_update'));
        }
    }
    public function destroy(Mowthq $mowthq)
    {
        if ($mowthq->delete()) {
          return response()->json(['value' => 1]);
        }
    }
}
