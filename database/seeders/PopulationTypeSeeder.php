<?php

namespace Database\Seeders;

use App\Models\PopulationType;
use Illuminate\Database\Seeder;

class PopulationTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PopulationType::create(['name' => 'families','name_ar'=>'عوائل']);
        PopulationType::create(['name' => 'singles','name_ar'=>'عزاب']);
    }
}
