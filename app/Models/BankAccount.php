<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BankAccount extends Model
{
    protected $guarded = ['created_at','updated_at'];

    protected static function boot()
    {
        parent::boot();
        static::saved(function ($data) {

            if (request()->hasFile('bank_image')) {
                if ($data->media()->where('option','bank_image')->exists()) {
                    $image = AppMedia::where(['app_mediaable_type' => 'App\Models\BankAccount','app_mediaable_id' => $data->id ,'media_type' => 'image','option' => 'bank_image'])->first();
                    if ($image) {
                        if (file_exists(storage_path('app/public/images/bank_account/'.$image->media))){
                            \File::delete(storage_path('app/public/images/bank_account/'.$image->media));
                            $image->delete();
                        }
                        $image->delete();
                    }
                }
                $image = uploadImg(request()->bank_image,'bank_account');
                $data->media()->create(['media' => $image,'media_type' => 'image','option' => 'bank_image']);
            }
        });

        static::deleted(function ($data) {
            if ($data->media()->exists()) {
                if ($data->media()->where(['option' => 'bank_image'])->exists()) {
                    $image = AppMedia::where(['app_mediaable_type' => 'App\Models\BankAccount','app_mediaable_id' => $data->id , 'option' => 'bank_image'])->first();
                    $image->delete();
                    if (file_exists(storage_path('app/public/images/bank_account/'.$image->media))){
                        \File::delete(storage_path('app/public/images/bank_account/'.$image->media));
                    }
                }

            }
        });
    }


    public function getBankImageAttribute()
    {
        if($this->media()->where(['option' => 'bank_image'])->exists()){
            return $this->media()->where(['option' => 'bank_image'])->first()->media;
        }

       else{
        $image =  'dashboardAssets/images/backgrounds/ahly.png';
        return asset($image);
       }


    }

    public function media()
    {
    	return $this->morphOne(AppMedia::class,'app_mediaable');
    }
}
