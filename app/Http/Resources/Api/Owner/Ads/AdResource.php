<?php

namespace App\Http\Resources\Api\Owner\Ads;

use App\Http\Resources\Api\Owner\Categories\CategoriesNameResource;
use App\Http\Resources\Api\Owner\Categories\CategoryFeaturesResource;
use App\Http\Resources\Api\Owner\Categories\CategoryFrontagesResource;
use App\Http\Resources\Api\Owner\Categories\CategoryResidenceTypeResource;
use App\Http\Resources\Api\Owner\Images\ImageResource;
use App\Http\Resources\Api\User\UserDataResource;
use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'ad_type'=>$this->ad_type,
            'category' => new CategoriesNameResource($this->category),
            'lat'=>$this->lat,
            'lng'=>$this->lng,
            'address'=>$this->address,
            'residence_type'=>new CategoryResidenceTypeResource($this->residence_type),
            'price'=>(float)$this->price,
            'images'=>ImageResource::collection($this->media),
            'frontage'=> new CategoryFrontagesResource($this->frontage),
            'features'=>AdFeatureResource::collection($this->ad_features),
            'ad_sale'=> $this->when($this->ad_type=='sale',new AdSaleResource($this->sale)),
            'ad_rent'=> $this->when($this->ad_type=='rent',new AdRentResource($this->rent)),
            'desc'=>$this->desc,
            'status'=>$this->status,
            'last_updated_at'=>now()->diffInDays($this->last_updated_at),
            'advertiser'=>new UserDataResource($this->advertiser)


        ];
    }
}
