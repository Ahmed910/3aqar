<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryFeature extends Model
{
    use HasFactory;
    protected $table = 'category_feature';
    protected $guarded = ['created_at','updated_at'];


    public function feature()
    {
        return $this->belongsTo(Feature::class,'feature_id');
    }

}
