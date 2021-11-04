<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\mowthq;
use Illuminate\Database\Seeder;

class MowthqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $city = City::first();
        $m1 = mowthq::create(['city_id' => $city->id,'fullname'=>'ahmed abotaleb','lat'=>30.44,'lng'=>32.33,'phone'=>96659994949]);

        $m2 = mowthq::create(['city_id' => $city->id,'fullname'=>'ahmed mohamed','lat'=>30.33,'lng'=>32.44,'phone'=>96659994349]);

        $m2 = mowthq::create(['city_id' => $city->id,'fullname'=>'ahmed ahmed','lat'=>30.55,'lng'=>32.22,'phone'=>96659934349]);
    }
}
