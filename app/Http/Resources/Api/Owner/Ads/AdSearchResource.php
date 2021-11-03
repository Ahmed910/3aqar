<?php

namespace App\Http\Resources\Api\Owner\Ads;

use App\Http\Resources\Api\Owner\Categories\CategoriesNameResource;
use App\Http\Resources\Api\User\UserDataResource;
use App\Http\Resources\Api\User\UserProfileResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdSearchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'address'=>$this->address,
            'price'=>$this->price,
            'category' => new CategoriesNameResource($this->category),
            'advertiser'=>new UserDataResource($this->advertiser)
        ];
    }
}
