<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mowthq extends Model
{
    protected $guarded = ['created_at','updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($data) {
            if (request()->hasFile('image')) {
                if ($data->media()->exists()) {
                    $image = AppMedia::where(['app_mediaable_type' => 'App\Models\mowthq','app_mediaable_id' => $data->id ,'media_type' => 'image'])->first();
                    $image->delete();
                    if (file_exists(storage_path('app/public/images/mowthq/'.$image->media))){
                        \File::delete(storage_path('app/public/images/mowthq/'.$image->media));
                        $image->delete();
                    }
                }
                $image = uploadImg(request()->image,'mowthq');
                $data->media()->create(['media' => $image,'media_type' => 'image']);
            }
        });

        static::deleted(function ($data) {
            if ($data->media()->exists()) {
                $image = AppMedia::where(['app_mediaable_type' => 'App\Models\mowthq','app_mediaable_id' => $data->id ,'media_type' => 'image'])->first();
                if (file_exists(storage_path('app/public/images/mowthq/'.$image->media))){
                    \File::delete(storage_path('app/public/images/mowthq/'.$image->media));
                }
                $image->delete();
            }
        });
    }

    public function getImageAttribute()
    {
        $image = $this->media()->exists() ? 'storage/images/mowthq/'.$this->media()->first()->media : 'dashboardAssets/images/cover/cover_sm.png';
        return asset($image);
    }

    // Relations
    // ========================= Image ===================
    public function media()
    {
    	return $this->morphOne(AppMedia::class,'app_mediaable');
    }
    public function city()
    {
        return $this->belongsTo(City::class,'city_id');
    }
}
