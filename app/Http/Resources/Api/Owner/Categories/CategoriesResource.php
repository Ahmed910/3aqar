<?php

namespace App\Http\Resources\Api\Owner\Categories;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
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
            'name'=> $name,
            'type'=>$this->type,
            'category_features'=> CategoryFeaturesResource::collection($this->features),
            'category_frontages'=> CategoryFrontagesResource::collection($this->frontages),
            'category_periods' => CategoryPeriodsResource::collection($this->periods),
            'category_population_types'=> CategoryPopulationTypesResource::collection($this->population_types),
            'category_residence_types' => CategoryResidenceTypeResource::collection($this->residence_types),
            'has_round_type'=> isset($this->round_type) ? true :false
        ];
    }
}
