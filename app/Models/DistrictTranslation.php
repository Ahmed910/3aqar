<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistrictTranslation extends Model
{
    use Uuid;

    public $timestamps = false;
    protected $guarded = ['created_at', 'updated_at'];


    public function setImageAttribute($value)
    {
        if ($value && $value->isValid()) {
            // dd($value);
            if (isset($this->attributes['image']) && $this->attributes['image']) {
                if (file_exists(storage_path('app/public/images/districts/'. $this->attributes['image']))) {
                    \File::delete(storage_path('app/public/images/districts/'. $this->attributes['image']));
                }
            }
            $image = uploadImg($value,'districts');
            $this->attributes['image'] = $image;
        }
    }

    public function getImageAttribute()
    {
        $image = isset($this->attributes['image']) && $this->attributes['image'] ? 'storage/images/districts/'.$this->attributes['image'] : 'dashboardAssets/images/backgrounds/avatar.jpg';
        return asset($image);
    }

}
