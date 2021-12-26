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
        $name = app()->getLocale() == 'ar' ? optional($this->feature)->name_ar : optional($this->feature)->name;
        return [
            'id'=>optional($this->feature)->id,
            'data_type'=>optional($this->feature)->data_type,
            'name'=>$name,
            'value'=>$this->value,
            'is_area'=>(bool)optional($this->feature)->is_area,
            'has_floor'=>(bool) optional($this->feature)->is_ground_floor,
            'start_value'=>optional($this->feature)->start_value,
            'end_value'=>optional($this->feature)->end_value,
            'min'=>optional($this->feature)->min ? optional($this->feature)->min:1,
            'max' => optional($this->feature)->max ? optional($this->feature)->max:6,
        ];
    }
}
