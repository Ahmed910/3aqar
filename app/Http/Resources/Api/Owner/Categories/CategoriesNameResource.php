<?php

namespace App\Http\Resources\Api\Owner\Categories;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesNameResource extends JsonResource
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
            'type'=>$this->type,
            
        ];
    }
}
