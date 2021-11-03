<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdFeature extends Model
{
    protected $table = 'ad_feature';
    protected $guarded = ['created_at','updated_at'];


    public function feature(){
        return $this->belongsTo(Feature::class,'feature_id');
    }

}
