<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = ['created_at','updated_at'];

    public function features()
    {
        return $this->belongsToMany(Feature::class,'category_feature','category_id','feature_id')->withTimestamps();
    }

    public function featuresPivot()
    {
        return $this->hasMany(CategoryFeature::class);
    }


    public function frontages()
    {
        return $this->belongsToMany(Frontage::class,'category_frontage','category_id','frontage_id')->withTimestamps();
    }

    
    public function country()
    {
        return $this->belongsTo(Country::class);
    }


    public function periods()
    {
        return $this->belongsToMany(Period::class,'category_period','category_id','period_id')->withTimestamps();
    }


    public function population_types()
    {
        return $this->belongsToMany(PopulationType::class,'category_population_type','category_id','population_type_id')->withTimestamps();
    }

    public function residence_types()
    {
        return $this->belongsToMany(ResidenceType::class,'category_residence_type','category_id','residence_type_id')->withTimestamps();
    }


}
