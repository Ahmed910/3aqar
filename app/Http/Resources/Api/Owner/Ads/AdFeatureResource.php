<?php

namespace App\Http\Resources\Api\Owner\Ads;

use App\Http\Resources\Api\Owner\Categories\CategoryFeaturesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdFeatureResource extends JsonResource
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
            'name'=>$this->feature->name,
            'value'=>$this->value
        ];
    }
}
