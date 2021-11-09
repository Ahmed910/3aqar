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
        $name = app()->getLocale() == 'ar' ? $this->feature->name_ar : $this->feature->name;
        return [
            'id'=>$this->feature->id,
            'data_type'=>$this->feature->data_type,
            'name'=>$name,
            'value'=>$this->value,
            'min'=>$this->feature->min ? $this->feature->min:1,
            'max' => $this->feature->max ? $this->feature->max:6,
        ];
    }
}
