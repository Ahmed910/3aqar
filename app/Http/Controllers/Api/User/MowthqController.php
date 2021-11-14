<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\User\Mowthq\MowthqResource;
use App\Models\mowthq;
use Illuminate\Http\Request;

class MowthqController extends Controller
{
    public function getmowthqs($city_id=null)

    {
        $mowthqs = mowthq::when(isset($city_id),function($q) use($city_id){
            $q->where('city_id',$city_id);
        })->get();
        return MowthqResource::collection($mowthqs)->additional(['status'=>'success','message'=>'']);
    }
}
