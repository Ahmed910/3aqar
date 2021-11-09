<?php

namespace App\Http\Resources\Api\Owner\Categories;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoryFeaturesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // dd($this->pivot->ordering);
        $feature = $this->feature;
        $name = app()->getLocale() == 'ar' ? $this->feature->name_ar : $this->feature->name;
        return [
            'id'=>$feature->id,
            'name'=>$name,
            'data_type'=>$feature->data_type,
            'is_area'=>$feature->is_area == true ? true : false,
            'min'=>$feature->min ? $feature->min:1,
            'max' => $feature->max ? $feature->max:6,
            'start_value' => $feature->start_value,
            'end_value' => $feature->end_value,
            'ordering' => (int)$this->ordering,

        ];
    }
}
