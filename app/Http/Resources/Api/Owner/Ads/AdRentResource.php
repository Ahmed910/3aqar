<?php

namespace App\Http\Resources\Api\Owner\Ads;

use App\Http\Resources\Api\Owner\Categories\CategoryPeriodsResource;
use App\Http\Resources\Api\Owner\Categories\CategoryPopulationTypesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdRentResource extends JsonResource
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
            'period'=> new CategoryPeriodsResource($this->period),
            'population_type'=> new CategoryPopulationTypesResource($this->population_type),
            'round_type'=>$this->round_type
        ];
    }
}
