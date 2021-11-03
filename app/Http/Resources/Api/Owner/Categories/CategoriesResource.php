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

        return [
            'id'=>$this->id,
            'name'=> $this->name,
            'type'=>$this->type,
            'category_features'=> CategoryFeaturesResource::collection($this->features),
            'category_frontages'=> CategoryFrontagesResource::collection($this->frontages),
            'category_periods' => CategoryPeriodsResource::collection($this->periods),
            'category_population_types'=> CategoryPopulationTypesResource::collection($this->population_types),
        ];
    }
}
