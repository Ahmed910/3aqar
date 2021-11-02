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
            'category_frontages'=> $this->when($this->frontages->count() > 0,CategoryFrontagesResource::collection($this->frontages)),
            'category_periods' => $this->when($this->periods->count() > 0,CategoryPeriodsResource::collection($this->periods)),
            'category_population_types'=> $this->when($this->population_types->count() > 0,CategoryPopulationTypesResource::collection($this->population_types)),
        ];
    }
}
