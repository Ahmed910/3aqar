<?php

namespace App\Http\Resources\Api\User\Mowthq;

use App\Http\Resources\Api\Help\CityResource;
use App\Http\Resources\Api\Help\DistrictResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MowthqResource extends JsonResource
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
            'fullname'=>$this->fullname,
            'phone'=>$this->phone,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'city'=>new DistrictResource($this->city)
        ];
    }
}
