<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create(['name' => 'Area','data_type'=>'text']);
        Feature::create(['name' => 'rooms','data_type'=>'number']);
        Feature::create(['name' => 'halls','data_type'=>'number']);
        Feature::create(['name' => 'bathrooms','data_type'=>'number']);
        Feature::create(['name' => '3aqar age','data_type'=>'text']);
        Feature::create(['name' => 'kitchen','data_type'=>'radio']);
        Feature::create(['name' => 'elevator','data_type'=>'radio']);
        Feature::create(['name' => 'special drawer','data_type'=>'radio']);
        Feature::create(['name' => 'car entrance','data_type'=>'radio']);
        Feature::create(['name' => 'furnished','data_type'=>'radio']);

    }
}
