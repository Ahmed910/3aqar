<?php

namespace App\Http\Resources\Api\Owner\Categories;

use App\Models\CategoryFeature;
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
        // dd($this->features);
        // $filtered = $this->features->filter(function ($value, $key) {
        //     return $value > 2;
        // });
        $features = CategoryFeature::where('category_id',$this->id)->orderBy('ordering','asc')->get();
        $name = app()->getLocale() == 'ar' ? $this->name_ar : $this->name;
        return [
            'id'=>$this->id,
            'name'=> $name,
            'type'=>$this->type,
            'category_features'=> CategoryFeaturesResource::collection($features),
            'category_frontages'=> CategoryFrontagesResource::collection($this->frontages),
            'category_periods' => CategoryPeriodsResource::collection($this->periods),
            'category_population_types'=> CategoryPopulationTypesResource::collection($this->population_types),
            'category_residence_types' => CategoryResidenceTypeResource::collection($this->residence_types),
            //'has_round_type'=> isset($this->round_type) ? true :false,
            'has_round_type'=>(bool) $this->is_ground_floor
        ];
    }
}
