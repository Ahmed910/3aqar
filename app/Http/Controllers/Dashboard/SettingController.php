<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Requests\Dashboard\Setting\{SettingRequest};

class SettingController extends Controller
{
    public function index()
    {
        if (!request()->ajax()) {
            return view('dashboard.setting.index');
        }
    }
      //post setting
      public function store(SettingRequest $request)
      {

         if (!request()->ajax()) {
                  $inputs= array_except($request->validated(),['logo','password']);
                  if ($request->password) {
                      $inputs['password'] = $request->password;
                  }
                  if ($request->hasFile('logo')) {
                      $setting=Setting::where('key','logo')->first();
                      if ($setting) {
                          if (file_exists(storage_path('app/public/images/setting/'. $setting->value))) {
                              \File::delete(storage_path('app/public/images/setting/'. $setting->value));
                          }
                      }
                      $inputs['logo']=$image = uploadImg($request->logo,'setting');
                  }

                  if ($request->hasFile('video_url')) {
                    $setting=Setting::where('key','video_url')->first();
                    if ($setting) {
                        if (file_exists(storage_path('app/public/uploads/setting/'. $setting->value))) {
                            \File::delete(storage_path('app/public/uploads/setting/'. $setting->value));
                        }
                    }
                    $inputs['video_url']=$image = uploadFile($request->video_url,'app/public/uploads/setting');
                }

                  if ($request->phones && count($request->phones)) {
                      $inputs['phones'] = json_encode($request->phones);
                  }

                  if ($request->whatsapps && count($request->whatsapps)) {
                    $inputs['whatsapps'] = json_encode($request->whatsapps);
                }
                  foreach ($inputs as $key => $value) {
                      Setting::updateOrCreate(['key' => trim($key)],['value'=> $value]);
                  }
                return redirect()->route('dashboard.setting.index')->withTrue(trans('dashboard.messages.success_update'));
            }else {
              abort(404);
            }
    }
}
