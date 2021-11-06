<?php

namespace App\Http\Resources\Api\Help;

use Illuminate\Http\Resources\Json\JsonResource;

class CityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'name' => $this->name,
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'district'=>new DistrictResource($this->district)
        ];
    }
}
