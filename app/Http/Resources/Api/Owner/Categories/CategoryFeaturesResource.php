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
        $name = app()->getLocale() == 'ar' ? $this->name_ar : $this->name;
        return [
            'id'=>$this->id,
            'name'=>$name,
            'data_type'=>$this->data_type,
            'min'=>$this->min ? $this->min:1,
            'max' => $this->max ? $this->max:6,
            'start_value' => $this->start_value,
            'end_value' => $this->end_value,
            'ordering' => (int)$this->ordering,

        ];
    }
}
