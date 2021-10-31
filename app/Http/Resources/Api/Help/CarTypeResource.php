<?php

namespace App\Http\Resources\Api\Help;

use Illuminate\Http\Resources\Json\JsonResource;

class CarTypeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this->id,
            'number_of_seats' => (int)$this->number_of_seats,
            'is_for_goods' => (bool)$this->is_for_goods,
            'name' => $this->name,
            'image' => $this->image,
            // 'desc' => $this->desc,
        ];
    }
}
