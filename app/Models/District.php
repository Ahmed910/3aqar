<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use App\Traits\Uuid;

class District extends Model implements TranslatableContract
{
    use Translatable ,Uuid;

    protected $guarded = ['created_at','updated_at'];
    public $translatedAttributes = ['name'];


    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }
    public function cities()
    {
    	return $this->hasMany(City::class);
    }

}
