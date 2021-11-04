<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Profile\{
    EditProfileRequest,
    UpdatePasswordRequest
};
use App\Http\Resources\Api\User\{UserProfileResource};
use App\Jobs\UpdateDriverLocation;
use App\Models\{User};
use DB;

class UserController extends Controller
{
    // Show Profile
    public function index()
    {
        $user = auth('api')->user();
        if (!$user->referral_code) {
            $user->update(['referral_code' => generate_unique_code(8, '\\App\\Models\\User', 'referral_code', 'alpha_numbers', 'lower')]);
        }
        return (new UserProfileResource($user))->additional(['status' => 'success', 'message' => '']);
    }


    // Edit Profile
    public function store(EditProfileRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = auth('api')->user();

            $profile_data = ['country_id', 'city_id', 'is_infected'];


            $user->update(array_except($request->validated(), $profile_data));
            $user->profile()->updateOrCreate(['user_id' => $user->id], array_only($request->validated(), $profile_data));
            $msg = "تم التعديل بنجاح";


            if ($request->device_token) {
                $user->devices()->firstOrCreate($request->only(['device_token']) + ['type' => 'ios']);
            }
            DB::commit();
            return (new UserProfileResource($user))->additional(['status' => 'success', 'message' => $msg]);
        } catch (\Exception $e) {
            DB::rollback();
            \Log::info($e->getMessage());
            return response()->json(['status' => 'fail', 'data' => null, 'message' => 'لم يتم التعديل حاول مرة اخرى'], 401);
        }
    }
    // Edit Password
    public function editPassword(UpdatePasswordRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = auth('api')->user();
            $user->update(array_only($request->validated(), ['password']));
            DB::commit();
            return (new UserProfileResource($user))->additional(['status' => 'success', 'message' => "تم التعديل بنجاح"]);
        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'fail', 'data' => null, 'message' => 'لم يتم التعديل حاول مرة اخرى'], 401);
        }
    }


    public function updateUserLocation(Request $request)
    {
        $data = $request->all();
        if (isset($data['drivers'])) {
            $data = json_decode($data['drivers']);
            UpdateDriverLocation::dispatch($data)->onQueue('high');
        }
        return response()->json(['data' => $request->all()]);
    }
}
