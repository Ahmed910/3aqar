<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{Ad};


class AdController extends Controller
{
    public function index()
    {
        $ads = Ad::latest()->paginate(100);
        return view('dashboard.ad.index',compact('ads'));
    }

    public function show(Ad $ad)
    {
        if (!request()->ajax()) {
           return view('dashboard.ad.show',compact('ad'));
        }
    }

    public function destroy(Ad $ad)
    {
        if ($ad->delete()) {
          return response()->json(['value' => 1]);
        }
    }
}
