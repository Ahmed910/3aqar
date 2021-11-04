<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\District;
use App\Models\DistrictTranslation;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $country = Country::first();
        $district= District::create([
            'country_id'=>$country->id,
         ]);

         DistrictTranslation::create(['name'=>'المنطقة الشمالية','district_id'=>$district->id,'locale'=>'ar']);
         DistrictTranslation::create(['name'=>'north area','district_id'=>$district->id,'locale'=>'en']);

         $district1= District::create([
            'country_id'=>$country->id,
         ]);

         DistrictTranslation::create(['name'=>'المنطقة الجنوبية','district_id'=>$district1->id,'locale'=>'ar']);
         DistrictTranslation::create(['name'=>'south area','district_id'=>$district1->id,'locale'=>'en']);


         $district2= District::create([
            'country_id'=>$country->id,
         ]);

         DistrictTranslation::create(['name'=>'المنطقة الشمالية الجنوبية','district_id'=>$district2->id,'locale'=>'ar']);
         DistrictTranslation::create(['name'=>'north south area','district_id'=>$district2->id,'locale'=>'en']);
    }
}
