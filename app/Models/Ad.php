<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    protected $dates = ['created_at'];
    protected $guarded = ['created_at','updated_at'];


    protected static function boot()
    {
        parent::boot();
        static::saved(function ($data) {

            if (request()->hasFile('images')) {
                if ($data->media()->exists()) {

                    $images = AppMedia::where(['app_mediaable_type' => 'App\Models\Ad','app_mediaable_id' => $data->id ,'media_type' => 'image'])->get();
                   foreach($images as $image){
                    $image->delete();
                    if (file_exists(storage_path('app/public/images/ad/'.$image->media))){
                        \File::delete(storage_path('app/public/images/ad/'.$image->media));
                        $image->delete();
                    }
                   }

                }
                $images = uploadImg(request()->images,'ad');
               $arr=[];
                foreach ($images as $image) {
                    $arr[] =['media'=>$image['image'],'media_type'=>'image','app_mediaable_id' => $data->id];
                }

                $data->media()->createMany($arr);


            }
        });

        static::deleted(function ($data) {
            if ($data->media()->exists()) {
                $images = AppMedia::where(['app_mediaable_type' => 'App\Models\Ad','app_mediaable_id' => $data->id ,'media_type' => 'image'])->get();
                foreach($images as $image){
                    if (file_exists(storage_path('app/public/images/ad/'.$image->media))){
                        \File::delete(storage_path('app/public/images/ad/'.$image->media));
                    }
                    $image->delete();
                }

            }
        });
    }


    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function media()
    {
    	return $this->morphMany(AppMedia::class,'app_mediaable');
    }

    public function features()
    {
        return $this->belongsToMany(Feature::class,'ad_feature','ad_id','feature_id')->withPivot('value','created_at','updated_at');
    }

    public function ad_features()
    {
        return $this->hasMany(AdFeature::class,'ad_id');
    }

    public function rent()
    {
        return $this->hasOne(AdRent::class,'ad_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function advertiser()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function residence_type()
    {
        return $this->belongsTo(ResidenceType::class);
    }

    public function frontage()
    {
        return $this->belongsTo(Frontage::class);
    }

    public function sale()
    {
        return $this->hasOne(AdSale::class,'ad_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class);
    }



    public function city()
    {
        return $this->belongsTo(City::class);
    }

    // Scopes

    public function scopeOwner($query)
    {

        $query->where('user_id', auth('api')->id());
    }

    public function scopeClosed($query)
    {
        $query->where('is_closed',false);
    }

}
