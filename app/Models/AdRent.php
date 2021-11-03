<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdRent extends Model
{
    protected $guarded = ['created_at','updated_at'];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function population_type()
    {
        return $this->belongsTo(PopulationType::class);
    }


}
