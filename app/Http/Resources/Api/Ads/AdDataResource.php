<?php

namespace App\Http\Resources\Api\Ads;

use App\Http\Resources\Api\Owner\Ads\AdFeatureResource;
use App\Http\Resources\Api\Owner\Categories\CategoriesNameResource;
use App\Http\Resources\Api\Owner\Images\ImageResource;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class AdDataResource extends JsonResource
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
            'category' => new CategoriesNameResource($this->category),
            'features'=>AdFeatureResource::collection($this->ad_features),
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'address'=>$this->address,
            'price'=>(float)$this->price,
            'images'=>ImageResource::collection($this->media),
            'time'=>now()->diffInDays(Carbon::parse($this->created_at)),
            'price_setting' => $this->ad_type == 'sale' ? (int)setting('sale_price') : (int)setting('sale_price'),
        ];
    }
}
