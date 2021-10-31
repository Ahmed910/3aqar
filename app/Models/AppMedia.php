<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Uuid;

class AppMedia extends Model
{
    use Uuid;
    protected $guarded=['created_at','updated_at'];

    public function app_mediaable()
    {
    	return $this->morphTo();
    }
}
