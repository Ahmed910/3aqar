<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at', 'deleted_at'];
    // protected $attributes=['min'=>1,'max'=>50];

 public function setMinAttribute($val)
 {
     if($val){
         $this->attributes['min'] = $val;
     }else{
        $this->attributes['min'] = 1;
     }

 }


 public function setMaxAttribute($val)
 {
     if($val){
         $this->attributes['max'] = $val;
     }else{
        $this->attributes['max'] = 50;
     }

 }

}
