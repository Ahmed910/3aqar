<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mowthq extends Model
{
    protected $guarded = ['created_at','updated_at'];
    
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
