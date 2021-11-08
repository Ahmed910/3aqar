<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use Uuid;
    protected $guarded = ['created_at','updated_at'];

    protected static function boot()
    {
        // parent::boot();
        // static::booted();
        static::saved(function ($data) {
            if (request()->hasFile('identity_number_image_for_owner')) {
                if ($data->media()->where('option','identity_number_image_for_owner')->exists()) {
                    $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id ,'media_type' => 'image','option' => 'identity_number_image_for_owner'])->first();
                    if ($image) {
                        if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                            \File::delete(storage_path('app/public/images/contract/'.$image->media));
                            $image->delete();
                        }
                        $image->delete();
                    }
                }
                $image = uploadImg(request()->identity_number_image_for_owner,'contract');
                $data->media()->create(['media' => $image,'media_type' => 'image','option' => 'identity_number_image_for_owner']);
            }
            if (request()->hasFile('property_document')) {
                if ($data->media()->where('option' , 'property_document')->exists()) {
                    $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id])->first();
                    $image->delete();
                    if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                        \File::delete(storage_path('app/public/images/contract/'.$image->media));
                    }elseif (file_exists(storage_path('app/public/files/contract/'.$image->media))){
                        \File::delete(storage_path('app/public/files/contract/'.$image->media));
                    }
                }

                    $image = uploadImg(request()->property_document,'contract');
                    $data->media()->create(['media' => $image,'media_type' => 'image','option' => 'property_document']);

            }


            if (request()->hasFile('address_image')) {
                if ($data->media()->where('option','address_image')->exists()) {
                    $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id ,'media_type' => 'image','option' => 'address_image'])->first();
                    if ($image) {
                        if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                            \File::delete(storage_path('app/public/images/contract/'.$image->media));
                            $image->delete();
                        }
                        $image->delete();
                    }
                }
                $image = uploadImg(request()->address_image,'contract');
                $data->media()->create(['media' => $image,'media_type' => 'image','option' => 'address_image']);
            }

            if (request()->hasFile('identity_number_image_for_citizen')) {
                if ($data->media()->where('option','identity_number_image_for_citizen')->exists()) {
                    $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id ,'media_type' => 'image','option' => 'identity_number_image_for_citizen'])->first();
                    if ($image) {
                        if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                            \File::delete(storage_path('app/public/images/contract/'.$image->media));
                            $image->delete();
                        }
                        $image->delete();
                    }
                }
                $image = uploadImg(request()->identity_number_image_for_citizen,'contract');
                $data->media()->create(['media' => $image,'media_type' => 'image','option' => 'identity_number_image_for_citizen']);
            }


            if (request()->hasFile('national_address_for_citizen')) {
                if ($data->media()->where('option','national_address_for_citizen')->exists()) {
                    $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id ,'media_type' => 'image','option' => 'national_address_for_citizen'])->first();
                    if ($image) {
                        if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                            \File::delete(storage_path('app/public/images/contract/'.$image->media));
                            $image->delete();
                        }
                        $image->delete();
                    }
                }
                $image = uploadImg(request()->national_address_for_citizen,'contract');
                $data->media()->create(['media' => $image,'media_type' => 'image','option' => 'national_address_for_citizen']);
            }


        });


        static::deleted(function ($data) {
            if ($data->media()->where(['option' => 'identity_number_image_for_owner'])->exists()) {
                $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id , 'option' => 'identity_number_image_for_owner'])->first();
                $image->delete();
                if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                    \File::delete(storage_path('app/public/images/contract/'.$image->media));
                }
            }

            if ($data->media()->where(['option' => 'property_document'])->exists()) {
                $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id , 'option' => 'property_document'])->first();
                $image->delete();
                if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                    \File::delete(storage_path('app/public/images/contract/'.$image->media));
                }
            }

            if ($data->media()->where(['option' => 'address_image'])->exists()) {
                $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id , 'option' => 'address_image'])->first();
                $image->delete();
                if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                    \File::delete(storage_path('app/public/images/contract/'.$image->media));
                }
            }

            if ($data->media()->where(['option' => 'identity_number_image_for_citizen'])->exists()) {
                $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id , 'option' => 'identity_number_image_for_citizen'])->first();
                $image->delete();
                if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                    \File::delete(storage_path('app/public/images/contract/'.$image->media));
                }
            }

            if ($data->media()->where(['option' => 'national_address_for_citizen'])->exists()) {
                $image = AppMedia::where(['app_mediaable_type' => 'App\Models\Contract','app_mediaable_id' => $data->id , 'option' => 'national_address_for_citizen'])->first();
                $image->delete();
                if (file_exists(storage_path('app/public/images/contract/'.$image->media))){
                    \File::delete(storage_path('app/public/images/contract/'.$image->media));
                }
            }

        });
    }

    public function getIdentityNumberImageForOwnerAttribute()
    {
        $image = isset($this->attributes['identity_number_image_for_owner']) && $this->attributes['identity_number_image_for_owner'] ? 'storage/images/contract/'.$this->attributes['identity_number_image_for_owner'] : 'dashboardAssets/images/backgrounds/avatar.jpg';
        return asset($image);
    }

    public function getPropertyDocumentAttribute()
    {
        $image = isset($this->attributes['property_document']) && $this->attributes['property_document'] ? 'storage/images/contract/'.$this->attributes['property_document'] : 'dashboardAssets/images/backgrounds/avatar.jpg';
        return asset($image);
    }

    public function getAddressImageAttribute()
    {
        $image = isset($this->attributes['address_image']) && $this->attributes['address_image'] ? 'storage/images/contract/'.$this->attributes['address_image'] : 'dashboardAssets/images/backgrounds/avatar.jpg';
        return asset($image);
    }

    //identity_number_image_for_citizen

    public function getIdentityNumberImageForCitizenAttribute()
    {
        $image = isset($this->attributes['identity_number_image_for_citizen']) && $this->attributes['identity_number_image_for_citizen'] ? 'storage/images/contract/'.$this->attributes['identity_number_image_for_citizen'] : 'dashboardAssets/images/backgrounds/avatar.jpg';
        return asset($image);
    }

    public function getNationalAddressForCitizenAttribute()
    {
        $image = isset($this->attributes['identity_number_image_for_citizen']) && $this->attributes['identity_number_image_for_citizen'] ? 'storage/images/contract/'.$this->attributes['identity_number_image_for_citizen'] : 'dashboardAssets/images/backgrounds/avatar.jpg';
        return asset($image);
    }

    // Relations
    public function media()
    {
    	return $this->morphOne(AppMedia::class,'app_mediaable');
    }

}
