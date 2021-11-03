<?php

namespace App\Http\Resources\Api\Owner\Ads;

use Illuminate\Http\Resources\Json\JsonResource;

class AdSaleResource extends JsonResource
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
            'north'=>$this->north,
            'south'=>$this->south,
            'east'=> $this->east,
            'west'=>$this->west,
            'disputes'=>$this->disputes,
            'mortgage_or_bond'=>$this->mortgage_or_bond
        ];
    }
}
