<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\CityTranslation;
use App\Models\District;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


            $city= City::create([
                'district_id'=>'0b99478e-24b4-4dc8-b8bb-9fefa12a226c',
             ]);

            CityTranslation::create(['name'=>'جدة','city_id'=>$city->id,'locale'=>'ar']);
            CityTranslation::create(['name'=>'gada','city_id'=>$city->id,'locale'=>'en']);

            $city1= City::create([
                'district_id'=>'0b99478e-24b4-4dc8-b8bb-9fefa12a226c',
             ]);

            CityTranslation::create(['name'=>'الرياض','city_id'=>$city1->id,'locale'=>'ar']);
            CityTranslation::create(['name'=>'alrayd','city_id'=>$city1->id,'locale'=>'en']);

            $city2= City::create([
                'district_id'=>'18b60f16-abda-47a1-bcf5-42a9839024c3',
             ]);

            CityTranslation::create(['name'=>'الدمام','city_id'=>$city2->id,'locale'=>'ar']);
            CityTranslation::create(['name'=>'damam','city_id'=>$city2->id,'locale'=>'en']);



        //  DistrictTranslation::create(['name'=>'المنطقة الشمالية','district_id'=>$district->id,'locale'=>'ar']);
        //  DistrictTranslation::create(['name'=>'north area','district_id'=>$district->id,'locale'=>'en']);
    }
}
