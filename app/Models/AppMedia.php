<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class AppMedia extends Model
{
    use Uuid;
    protected $guarded = ['created_at', 'updated_at'];

    public function app_mediaable()
    {
        return $this->morphTo();
    }


    public function getImageUrlAttribute()
    {
        if ($this->attributes['app_mediaable_type'] == 'App\Models\Ad') {
            if (file_exists(storage_path('app/public/images/ad' . "/" . $this->attributes['media']))) {
                return asset('storage/images/ad') . '/' . $this->attributes['media'];
            } else {
                return asset('dashboardAssets/images/cover/cover_sm.png');
            }
        }
        return $this->attributes['media'];
    }
}
